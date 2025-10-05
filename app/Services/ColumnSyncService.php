<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Stichoza\GoogleTranslate\GoogleTranslate;

class ColumnSyncService
{
    public static function make(string $module, string $model)
    {
        $resourceClass = "Modules\\{$module}\\Transformers\\{$model}\\{$model}Resource";

        if (strtolower($model) === 'user') {
            $modelClass = "App\\Models\\User";
        } else {
            $modelClass = "Modules\\{$module}\\Models\\{$model}";
        }

        if (!class_exists($resourceClass)) {
            return "Resource class '{$resourceClass}' not found!";
        }

        if (!class_exists($modelClass)) {
            return "Model class '{$modelClass}' not found!";
        }

        $dummyModel = new $modelClass;
        $resource   = new $resourceClass($dummyModel);

        $columns = array_keys($resource->toArray(request()));

        $tr   = new GoogleTranslate('ar');
        $skip = ['id', 'created_at', 'updated_at', 'deleted_at'];

        $fields = [];

        foreach ($columns as $col) {
            if (in_array($col, $skip)) {
                continue;
            }

            $arabicKey   = $tr->translate($col);
            $arabicLabel = $tr->translate(Str::title(str_replace('_', ' ', $col)));

            $fields[] = [
                $col,                                   // en key
                $arabicKey,                             // ar key
                Str::title(str_replace('_', ' ', $col)),// en label
                $arabicLabel                            // ar label
            ];
        }

        $path = module_path($module, "Database/Seeders");

        if (!File::exists($path)) {
            File::makeDirectory($path, 0755, true);
        }

        $filePath   = $path . '/ColumnsSeeder.php';
        $namespace  = "Modules\\{$module}\\Database\\Seeders";
        $tableName  = 'columns_' . Str::snake(Str::pluralStudly($module));

         if (!File::exists($filePath)) {
            $arrayString = self::arrayToShortSyntax([$model => $fields], 2);

            $seederContent = <<<PHP
<?php

namespace {$namespace};

use Illuminate\\Database\\Seeder;
use Illuminate\\Support\\Facades\\DB;

class ColumnsSeeder extends Seeder
{
    public function run(): void
    {
        \$now = now()->toDateTimeString();

        \$columns = {$arrayString};

        foreach (\$columns as \$model => \$fields) {
            foreach (\$fields as \$field) {
                DB::table('{$tableName}')->insert([
                    'model' => \$model,
                    'key' => json_encode(['en' => \$field[0], 'ar' => \$field[1]], JSON_UNESCAPED_UNICODE),
                    'label' => json_encode(['en' => \$field[2], 'ar' => \$field[3]], JSON_UNESCAPED_UNICODE),
                    'sortable' => true,
                    'filterable' => true,
                    'created_at' => \$now,
                    'updated_at' => \$now,
                ]);
            }
        }
    }
}
PHP;
            File::put($filePath, $seederContent);

        } else {
             $oldContent = File::get($filePath);

            if (strpos($oldContent, "'{$model}'") === false) {
                $inject = "        '{$model}' => " . self::arrayToShortSyntax($fields, 2) . ",\n";

                $newContent = preg_replace(
                    '/(\$columns\s*=\s*\[)/',
                    "$1\n{$inject}",
                    $oldContent
                );

                File::put($filePath, $newContent);
            }
        }

        return "Seeder updated: {$filePath}";
    }

    /**
     * Convert array to short syntax for seeder
     */private static function arrayToShortSyntax(array $array, int $indent = 0): string
{
    $indentStr = str_repeat('    ', $indent);
    $nextIndentStr = str_repeat('    ', $indent + 1);

     if (!self::isAssoc($array) && self::isFlatArray($array)) {
        $items = array_map(fn($v) => var_export($v, true), $array);
        return '[' . implode(', ', $items) . ']';
    }

     if (self::isAssoc($array)) {
        $items = [];
        foreach ($array as $key => $value) {
            $items[] = $nextIndentStr . var_export($key, true) . ' => ' . self::arrayToShortSyntax($value, $indent + 1);
        }
        return "[\n" . implode(",\n", $items) . "\n{$indentStr}]";
    }

     $items = [];
    foreach ($array as $value) {
        $items[] = $nextIndentStr . self::arrayToShortSyntax($value, $indent + 1);
    }
    return "[\n" . implode(",\n", $items) . "\n{$indentStr}]";
}

private static function isAssoc(array $arr): bool
{
    return array_keys($arr) !== range(0, count($arr) - 1);
}

private static function isFlatArray(array $arr): bool
{
    foreach ($arr as $v) {
        if (is_array($v)) {
            return false;
        }
    }
    return true;
}
}
