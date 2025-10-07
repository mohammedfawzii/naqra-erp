<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class ResourceGenerator
{
    public static function make(string $module, string $model)
    {
        $table = Str::snake(Str::pluralStudly($model));

        if (!Schema::hasTable($table)) {
            return "Table '{$table}' does not exist in database!";
        }

        $baseFolder  = module_path($module, "app/Transformers");
        $modelFolder = $baseFolder . "/{$model}";

        if (!File::exists($modelFolder)) {
            File::makeDirectory($modelFolder, 0755, true);
        }

        $resourcePath = "{$modelFolder}/{$model}Resource.php";
        $enumsPath    = "{$modelFolder}/{$model}ResourceEnums.php";

        // إنشاء Resource إذا مش موجود
        if (!File::exists($resourcePath)) {
            $columns = Schema::getColumnListing($table);
            $resourceStub = self::generateResourceStub($module, $model, $columns);
            File::put($resourcePath, $resourceStub);
        }

        // تعديل المودل للعلاقات والjson
        self::updateModelRelations($module, $model, $table);

        // إنشاء ResourceEnums إذا مش موجود
        if (!File::exists($enumsPath)) {
            $enumsStub = self::generateEnumsStub($module, $model, $table);
            File::put($enumsPath, $enumsStub);
        }

        return "{$model}Resource + Relations updated successfully inside Module {$module}.";
    }

  private static function updateModelRelations($module, $model, $table)
{
    $modelPath = module_path($module, "app/Models/{$model}.php");
    if (!File::exists($modelPath)) return;

    $content = File::get($modelPath);
    $columns = Schema::getColumnListing($table);
// لو فيه JSON اعمل translatable بالأعمدة نفسها
if (!empty($jsonColumns)) {
    $translatableArray = "protected \$translatable = ['" . implode("','", $jsonColumns) . "'];";

    // جملة للتأكد إنها شغالة، زي method أو property
    $extraLine = "public function testJsonColumns() { return 'JSON columns are working!'; }";

    if (preg_match('/protected \$translatable\s*=\s*\[.*?\];/s', $content)) {
        // لو موجود بالفعل، حدثه بالأعمدة الجديدة
        $content = preg_replace(
            '/protected \$translatable\s*=\s*\[.*?\];/s',
            $translatableArray,
            $content
        );
        // ضيف الجملة بعد protected $translatable مباشرة
        $content = preg_replace(
            '/protected \$translatable\s*=\s*\[.*?\];/',
            "$0\n    $extraLine",
            $content
        );
    } else {
        // لو مش موجود، ضيفه بعد فتح الكلاس مباشرة
        if (preg_match('/class ' . $model . '.*?{/', $content, $matches, PREG_OFFSET_CAPTURE)) {
            $pos = $matches[0][1] + strlen($matches[0][0]);
            $content = substr_replace($content, "\n    {$translatableArray}\n    {$extraLine}\n", $pos, 0);
        }
    }
}



    // ===== إضافة علاقات belongsTo لكل عمود _id =====
    $skipFunctions = ['attendanceAttachments', 'employee', 'employeeinfo', 'attachments', 'payrollAttachments'];
    foreach ($columns as $col) {
        if (Str::endsWith($col, '_id')) {
            $relation = Str::camel(Str::replaceLast('_id', '', $col));
            if (in_array($relation, $skipFunctions) || Str::contains($content, "function {$relation}(")) continue;
            $relatedModel = Str::studly(Str::replaceLast('_id', '', $col));
            $relationCode = "\n    public function {$relation}()\n    {\n        return \$this->belongsTo({$relatedModel}::class, '{$col}');\n    }\n";
            $content = preg_replace('/}\s*$/', $relationCode . "\n}", $content);
        }
    }

    File::put($modelPath, $content);
}




    private static function generateResourceStub($module, $model, $columns)
    {
        $className = "{$model}Resource";
        $resourceArray = [];
        foreach ($columns as $col) {
            $resourceArray[] = "            '{$col}' => \$this->{$col},";
        }

        $resourceContent = implode("\n", $resourceArray);

        return "<?php

namespace Modules\\{$module}\\Transformers\\{$model};

use Illuminate\\Http\\Resources\\Json\\JsonResource;

/**
 * 🔹 {$className}
 */
class {$className} extends JsonResource
{
    public function toArray(\$request): array
    {
        return [
{$resourceContent}
        ];
    }
}
";
    }

    private static function generateEnumsStub($module, $model, $table)
    {
        $className = "{$model}ResourceEnums";
        $columns   = Schema::getColumnListing($table);

        $relationsArray = [];
        $enumsFunctions = [];
        $useModels      = [];

        foreach ($columns as $col) {
            $type = Schema::getColumnType($table, $col);

            if ($type === 'enum') {
                $enumValues = Schema::getConnection()
                    ->select("SHOW COLUMNS FROM {$table} WHERE Field = '{$col}'")[0]->Type ?? '';

                preg_match("/enum\((.*)\)/", $enumValues, $matches);

                if (!empty($matches[1])) {
                    $values = str_getcsv(str_replace("'", "", $matches[1]));
                    $fnName = Str::camel(Str::pluralStudly($col));
                    $body = "        return [\n";
                    foreach ($values as $val) {
                        $label = ucfirst(str_replace('_', ' ', $val));
                        $body .= "            ['label' => '{$label}', 'value' => '{$val}'],\n";
                    }
                    $body .= "        ];";

                    $enumsFunctions[] = "
    protected function {$fnName}(): array
    {
{$body}
    }";

                    $relationsArray[] = "            '{$col}' => \$this->{$fnName}(),";
                }
            }

            if (Str::endsWith($col, '_id') && $col !== 'employeeinfo_id') {
                $relation     = Str::camel(Str::replaceLast('_id', '', $col));
                $modelName    = Str::studly(Str::replaceLast('_id', '', $col));
                $relatedTable = Str::snake(Str::pluralStudly($modelName));
                if (!Schema::hasTable($relatedTable)) continue;

                $relatedCols = Schema::getColumnListing($relatedTable);
                $firstCol = collect($relatedCols)
                    ->reject(fn($c) => in_array($c, ['id','created_at','updated_at','deleted_at']))
                    ->first();
                $labelKey = $firstCol ?? 'id';
                $useModels[] = $modelName;
                $relationsArray[] = "            '{$relation}' => \$this->enum({$modelName}::class, '{$labelKey}'),";
            }
        }

        $useString = '';
        if (!empty($useModels)) {
            $unique = array_unique($useModels);
            $useString = "use Modules\\{$module}\\Models\\{\n    " . implode(",\n    ", $unique) . "\n};";
        }

        $relationsContent = implode("\n", $relationsArray);

        $enumFunction = "
    protected function enum(string \$modelClass, string \$labelField): array
    {
        \$records = \$modelClass::query()->select('id', \$labelField)->get();
        return BaseEnums::collectionFrom(\$records, \$labelField)->toArray();
    }";

        return "<?php

namespace Modules\\{$module}\\Transformers\\{$model};

use Illuminate\\Http\\Resources\\Json\\JsonResource;
use App\\Transformers\\BaseEnums\\BaseEnums;
{$useString}

/**
 * 🔹 {$className}
 */
class {$className} extends JsonResource
{
    public function toArray(\$request): array
    {
        return [
{$relationsContent}
        ];
    }

{$enumFunction}

" . implode("\n", $enumsFunctions) . "
}
";
    }
}
