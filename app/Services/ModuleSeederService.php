<?php

namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;

class ModuleSeederService
{
    public static function make(string $module, string $model)
    {
        $table = Str::snake(Str::pluralStudly($model));

        if (!Schema::hasTable($table)) {
            return "Table '{$table}' does not exist in database!";
        }

        $modelSeederFolder = module_path($module, "Database/Seeders/{$model}");
        if (!File::exists($modelSeederFolder)) {
            File::makeDirectory($modelSeederFolder, 0755, true);
        }

        $seederPath = "{$modelSeederFolder}/{$model}Seeder.php";

        if (File::exists($seederPath)) {
            return "{$model}Seeder already exists!";
        }

        $columns = Schema::getColumnListing($table);

        $seederStub = self::generateStub($module, $model, $columns, $table);

        File::put($seederPath, $seederStub);

        self::updateModuleSeeder($module, $model);

        $seederClass = "Modules\\{$module}\\Database\\Seeders\\{$model}\\{$model}Seeder";
        Artisan::call('db:seed', [
            '--class' => $seederClass,
            '--force' => true
        ]);

        $moduleSeederClass = "Modules\\{$module}\\Database\\Seeders\\{$module}DatabaseSeeder";
        Artisan::call('db:seed', [
            '--class' => $moduleSeederClass,
            '--force' => true
        ]);

        return "{$model}Seeder created and seeded successfully inside Module {$module}.";
    }

   private static function generateStub($module, $model, $columns, $table)
{
    $rows = "        \${$table} = [\n";

    for ($i = 1; $i <= 5; $i++) {
        $dataString = "            [\n";

        foreach ($columns as $col) {
            if (in_array($col, ['id', 'created_at', 'updated_at'])) continue;

            if (Str::endsWith($col, '_id')) {
                $value = rand(1, 3);
                $dataString .= "                '{$col}' => {$value},\n";
                continue;
            }

            $columnType = self::getColumnType($table, $col);

            // ✅ حالة الـ JSON
            if ($columnType === 'json') {
                $dataString .= "                '{$col}' => [\n";
                $dataString .= "                    'en' => 'Sample {$col} {$i}',\n";
                $dataString .= "                    'ar' => 'عينة {$col} {$i}'\n";
                $dataString .= "                ],\n";
                continue;
            }

            // ✅ حالة الـ ENUM
            if ($columnType === 'enum') {
                $enumValues = self::getEnumValues($table, $col);
                $value = $enumValues[0] ?? 'default'; // أول قيمة في الـ enum
                $dataString .= "                '{$col}' => '{$value}',\n";
                continue;
            }

            if (in_array($columnType, ['integer','int','bigint','smallint','mediumint','tinyint'])) {
                $value = rand(1, 1000);
                $dataString .= "                '{$col}' => {$value},\n";

            } elseif (in_array($columnType, ['float', 'double', 'decimal'])) {
                $value = number_format(rand(100, 10000) / 100, 2, '.', '');
                $dataString .= "                '{$col}' => {$value},\n";

            } elseif ($columnType === 'date') {
                $value = now()->subYears(rand(1, 20))->format('Y-m-d');
                $dataString .= "                '{$col}' => '{$value}',\n";

            } elseif (in_array($columnType, ['datetime', 'timestamp'])) {
                $value = now()->subDays(rand(1, 500))->format('Y-m-d H:i:s');
                $dataString .= "                '{$col}' => '{$value}',\n";

            }elseif ($columnType === 'time') {
    $value = now()->subMinutes(rand(1, 600))->format('H:i:s');
    $dataString .= "                '{$col}' => '{$value}',\n";
            }

            else {
                $value = "Sample {$col} {$i}";
                $dataString .= "                '{$col}' => '{$value}',\n";
            }
        }

        $dataString .= "            ],\n";
        $rows .= $dataString;
    }

    $rows .= "        ];\n\n";
    $rows .= "        foreach (\${$table} as \$data) {\n";
    $rows .= "            {$model}::firstOrCreate(\$data);\n";
    $rows .= "        }\n";

    $namespace = "Modules\\{$module}\\Database\\Seeders\\{$model}";

    return "<?php

namespace {$namespace};

use Illuminate\\Database\\Seeder;
use Modules\\{$module}\\Models\\{$model};

class {$model}Seeder extends Seeder
{
    public function run(): void
    {
{$rows}    }
}
";
}

/**
  */
private static function getEnumValues($table, $column)
{
    $type = DB::selectOne("SHOW COLUMNS FROM {$table} WHERE Field = '{$column}'")->Type;

    preg_match("/^enum\('(.*)'\)$/", $type, $matches);

    return isset($matches[1]) ? explode("','", $matches[1]) : [];
}


    private static function updateModuleSeeder($module, $model)
    {
        $moduleSeederPath = module_path($module, "Database/Seeders/{$module}DatabaseSeeder.php");

        if (!File::exists($moduleSeederPath)) {
            $stub = "<?php

namespace Modules\\{$module}\\Database\\Seeders;

use Illuminate\\Database\\Seeder;

class {$module}DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Seeders will be added here
    }
}
";
            File::put($moduleSeederPath, $stub);
        }

        $content = File::get($moduleSeederPath);
        $seederClass = "{$model}\\{$model}Seeder::class";

        if (!str_contains($content, $seederClass)) {
            if (preg_match('/public function run\(\): void\s*\{/', $content, $matches, PREG_OFFSET_CAPTURE)) {
                $pos = $matches[0][1] + strlen($matches[0][0]);
                $content = substr_replace($content, "\n        \$this->call({$seederClass});", $pos, 0);
                File::put($moduleSeederPath, $content);
            }
        }
    }

    private static function getColumnType($table, $column)
    {
        return DB::getSchemaBuilder()->getColumnType($table, $column);
    }

    private static function isMoneyColumn(string $column): bool
    {
        $keywords = ['price', 'amount', 'total', 'salary', 'cost'];
        foreach ($keywords as $keyword) {
            if (Str::contains(strtolower($column), $keyword)) {
                return true;
            }
        }
        return false;
    }
}
