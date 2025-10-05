<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
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

        if (!File::exists($resourcePath)) {
            $columns = Schema::getColumnListing($table);
            $resourceStub = self::generateStub($module, $model, $columns);
            File::put($resourcePath, $resourceStub);
        }

        self::updateModelRelations($module, $model, $table);

            $enumsPath = "{$modelFolder}/{$model}ResourceEnums.php";
        if (!File::exists($enumsPath)) {
            $enumsStub = self::generateEnumsStub($module, $model, $table);
            File::put($enumsPath, $enumsStub);
        }

        return "{$model}Resource + Relations updated successfully inside Module {$module}.";
    }

 private static function generateStub($module, $model, $columns)
{
    $fieldsString = "";
    $table = Str::snake(Str::pluralStudly($model));

     $skipCols = ['id', 'created_at', 'updated_at', 'deleted_at', 'employee','employee_id','Attachments','attendanceAttachments','attendanceAttachments_id','employeeinfo','employeeinfo_id'];

    foreach ($columns as $col) {
         if (in_array($col, $skipCols)) {
            continue;
        }

        $type = Schema::getColumnType($table, $col);

        if (Str::endsWith($col, '_id')) {
            $relation = Str::camel(Str::replaceLast('_id', '', $col));
            $relatedTable = Str::snake(Str::pluralStudly(Str::replaceLast('_id', '', $col)));

            if (Schema::hasTable($relatedTable)) {
                $relatedCols = Schema::getColumnListing($relatedTable);
                $firstCol = collect($relatedCols)
                    ->reject(fn($c) => in_array($c, ['id', 'created_at', 'updated_at', 'deleted_at', 'employee_id', 'employee','Attachments','attendanceAttachments','attendanceAttachments_id','employeeinfo','employeeinfo_id']))
                    ->first();
                $priorityCols = ['name', 'title', 'full_name', 'company_name'];
                $preferredCol = collect($priorityCols)->first(fn($pc) => in_array($pc, $relatedCols));
                $colToUse = $preferredCol ?? $firstCol ?? null;

                if ($colToUse) {
                    $relatedType = Schema::getColumnType($relatedTable, $colToUse);
                    if ($relatedType === 'json') {
                        $fieldsString .= "            '{$relation}' => \$resource->{$relation} ? \$resource->{$relation}->getTranslation('{$colToUse}', app()->getLocale()) : null,\n";
                    } else {
                        $fieldsString .= "            '{$relation}' => \$resource->{$relation}?->{$colToUse},\n";
                    }
                } else {
                    $fieldsString .= "            '{$relation}' => null,\n";
                }
            } else {
                $fieldsString .= "            '{$relation}' => null,\n";
            }
        } elseif ($type === 'json') {
            $fieldsString .= "            '{$col}' => \$resource->getTranslation('{$col}', app()->getLocale()),\n";
        } else {
            $fieldsString .= "            '{$col}' => \$resource->{$col},\n";
        }
    }

    return "<?php

namespace Modules\\{$module}\\Transformers\\{$model};

use App\Transformers\BaseResource\BaseResource;

class {$model}Resource extends BaseResource
{
    public function toArray(\$request)
    {
        \$resource = \$this->resource;

        return array_merge(
            \$this->baseArray(),
            [
{$fieldsString}            ],
            \$this->timestampsArray()
        );
    }
}
";
}

   private static function updateModelRelations($module, $model, $table)
{
    $modelPath = module_path($module, "app/Models/{$model}.php");

    if (!File::exists($modelPath)) {
        return;
    }

    $content = File::get($modelPath);

    // ✅ استبدال Model بـ BaseModel لو لسه مش متعدل
    if (Str::contains($content, 'extends Model')) {
        $content = str_replace('extends Model', 'extends BaseModel', $content);

        // إضافة use BaseModel; لو مش موجود
        if (!Str::contains($content, 'use App\\Models\\BaseModel;')) {
            $content = preg_replace(
                '/namespace .*?;\s*/',
                "$0\nuse App\\Models\\BaseModel;\n",
                $content
            );
        }
    }

    $columns = Schema::getColumnListing($table);

    $skipFunctions = ['attendanceAttachments', 'employee', 'employeeinfo','attachments','payrollAttachments'];

    foreach ($columns as $col) {
        if (Str::endsWith($col, '_id')) {
            $relation = Str::camel(Str::replaceLast('_id', '', $col));

            if (in_array($relation, $skipFunctions)) {
                continue;
            }

            $relatedModel = Str::studly(Str::replaceLast('_id', '', $col));

            if (Str::contains($content, "function {$relation}(")) {
                continue;
            }

            $relationCode = "

    public function {$relation}()
    {
        return \$this->belongsTo({$relatedModel}::class, '{$col}');
    }
";

            $content = preg_replace('/}\s*$/', $relationCode . "\n}", $content);
        }
    }

    File::put($modelPath, $content);
}
private static function generateEnumsStub($module, $model, $table)
{
    $className = "{$model}ResourceEnums";
    $columns   = Schema::getColumnListing($table);

    $fieldsString = "";
    $useModels    = []; // 🟢 هنا هخزن أسماء الموديلات

    foreach ($columns as $col) {
        $type = Schema::getColumnType($table, $col);

        // ✅ ENUM columns → label/value (PHP array format)
        if ($type === 'enum') {
            $enumValues = Schema::getConnection()
                ->select("SHOW COLUMNS FROM {$table} WHERE Field = '{$col}'")[0]->Type ?? '';

            preg_match("/enum\((.*)\)/", $enumValues, $matches);

            if (!empty($matches[1])) {
                $values = str_getcsv(str_replace("'", "", $matches[1]));

                $formatted = array_map(function ($val) {
                    return "[ 'label' => '" . ucfirst(str_replace('_', ' ', $val)) . "', 'value' => '{$val}' ]";
                }, $values);

                $fieldsString .= "                '{$col}' => [\n                    " . implode(",\n                    ", $formatted) . "\n                ],\n";
            }
        }

        // ✅ Relations من *_id (مع تخطي employeeinfo_id)
        if (Str::endsWith($col, '_id') && $col !== 'employeeinfo_id') {
            $relation     = Str::camel(Str::replaceLast('_id', '', $col)); // ex: position
            $modelName    = Str::studly(Str::replaceLast('_id', '', $col)); // ex: Position
            $relatedTable = Str::snake(Str::pluralStudly($modelName));      // ex: positions

            // جيب أول عمود بعد الـ id
            $relatedCols = Schema::getColumnListing($relatedTable);
            $firstCol = collect($relatedCols)
                ->reject(fn($c) => in_array($c, ['id', 'created_at', 'updated_at', 'deleted_at']))
                ->first();

            $labelKey = $firstCol ?? 'id';

            // 🟢 ضيف الموديل لقائمة use
            $useModels[] = "use Modules\\CmsErp\\Models\\{$modelName};";

            $fieldsString .= "                '{$relation}' => BaseEnums::collectionFrom({$modelName}::all(), '{$labelKey}'),\n";
        }
    }

    // 🟢 شيل التكرارات
    $useModels = array_unique($useModels);

    return "<?php

namespace Modules\\{$module}\\Transformers\\{$model};

use Illuminate\\Http\\Resources\\Json\\JsonResource;
use App\\Transformers\\BaseEnums\\BaseEnums;
" . implode("\n", $useModels) . "

class {$className} extends JsonResource
{
    public function toArray(\$request)
    {
       return [
{$fieldsString}
        ];
    }
}
";
}
}
