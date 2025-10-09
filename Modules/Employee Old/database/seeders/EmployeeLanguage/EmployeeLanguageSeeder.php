<?php

namespace Modules\Employee\Database\Seeders\EmployeeLanguage;

use Illuminate\Database\Seeder;
use Modules\Employee\Models\EmployeeLanguage;

class EmployeeLanguageSeeder extends Seeder
{
    public function run(): void
    {
        $employee_languages = [
            [
                'employee_id' => 1,
                'language' => 'Sample language 1',
                'writing_level' => 'Sample writing_level 1',
                'reading_level' => 'Sample reading_level 1',
                'speaking_level' => 'Sample speaking_level 1',
            ],
            [
                'employee_id' => 1,
                'language' => 'Sample language 2',
                'writing_level' => 'Sample writing_level 2',
                'reading_level' => 'Sample reading_level 2',
                'speaking_level' => 'Sample speaking_level 2',
            ],
            [
                'employee_id' => 2,
                'language' => 'Sample language 3',
                'writing_level' => 'Sample writing_level 3',
                'reading_level' => 'Sample reading_level 3',
                'speaking_level' => 'Sample speaking_level 3',
            ],
            [
                'employee_id' => 1,
                'language' => 'Sample language 4',
                'writing_level' => 'Sample writing_level 4',
                'reading_level' => 'Sample reading_level 4',
                'speaking_level' => 'Sample speaking_level 4',
            ],
            [
                'employee_id' => 1,
                'language' => 'Sample language 5',
                'writing_level' => 'Sample writing_level 5',
                'reading_level' => 'Sample reading_level 5',
                'speaking_level' => 'Sample speaking_level 5',
            ],
        ];

        foreach ($employee_languages as $data) {
            EmployeeLanguage::firstOrCreate($data);
        }
    }
}
