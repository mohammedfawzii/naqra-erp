<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Stichoza\GoogleTranslate\GoogleTranslate;

class InfoSyncService
{
    /**
     * Generate/Update InfoSeeder file instead of inserting in DB
     *
     * @param string $module     Module name (e.g., Facilities)
     * @param string $modelName  Name to store in infoable_type (e.g., 'User')
     * @return string
     */
    public static function make(string $module, string $modelName)
    {
        $tr = new GoogleTranslate('ar');

        $englishTitle = Str::title(str_replace('_', ' ', $modelName));
        $arabicTitle  = $tr->translate($englishTitle);

        $englishDesc = "Description for {$englishTitle}";
        $arabicDesc  = $tr->translate($englishDesc);

        $path = module_path($module, "Database/Seeders");

        if (!File::exists($path)) {
            File::makeDirectory($path, 0755, true);
        }

        $seederName = "InfoSeeder.php";
        $filePath   = $path . '/' . $seederName;

        $namespace  = "Modules\\{$module}\\Database\\Seeders";

        $newRecord = <<<PHP
            [
                'infoable_type' => '{$modelName}',
                'title' => ['en' => '{$englishTitle}', 'ar' => '{$arabicTitle}'],
                'desc'  => ['en' => '{$englishDesc}', 'ar' => '{$arabicDesc}'],
            ],
PHP;

         if (!File::exists($filePath)) {
            $seederContent = <<<PHP
<?php

namespace {$namespace};

use Illuminate\\Database\\Seeder;
use Modules\\{$module}\\Models\\Info{$module};

class InfoSeeder extends Seeder
{
    public function run(): void
    {
        \$records = [
{$newRecord}
        ];

        foreach (\$records as \$record) {
            Info{$module}::firstOrCreate(
                ['infoable_type' => \$record['infoable_type']],
                [
                    'title' => \$record['title'],
                    'desc'  => \$record['desc'],
                ]
            );
        }
    }
}
PHP;
            File::put($filePath, $seederContent);
        } else {
             $oldContent = File::get($filePath);

            if (strpos($oldContent, "'infoable_type' => '{$modelName}'") === false) {
                $newContent = preg_replace(
                    '/(\$records\s*=\s*\[\n)/',
                    "\$1{$newRecord}",
                    $oldContent
                );

                File::put($filePath, $newContent);
            }
        }

        return "InfoSeeder updated: {$filePath}";
    }
}
