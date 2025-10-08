<?php

namespace Modules\Employee\Database\Seeders\EmployeeQualification;

use Illuminate\Database\Seeder;
use Modules\Employee\Models\EmployeeQualification;

class EmployeeQualificationSeeder extends Seeder
{
    public function run(): void
    {
        $employee_qualifications = [
              [
        'employee_id'=>1,
        'country_id' => 2,
        'city_id' => 3,
        'university' => 'Sample university 1',
        'college' => 'Sample college 1',
        'qualification' => 'Sample qualification 1',
        'major' => 'Sample major 1',
        'degree' => 'Sample degree 1',
        'gpa' => 3.5,  
        'graduation_year' => 2020, 
        'notes' => 'Sample notes 1',
    ],
               [
                'employee_id'=>1,
        'country_id' => 2,
        'city_id' => 3,
        'university' => 'Sample university 1',
        'college' => 'Sample college 1',
        'qualification' => 'Sample qualification 1',
        'major' => 'Sample major 1',
        'degree' => 'Sample degree 1',
        'gpa' => 3.5,  
        'graduation_year' => 2020,  
        'notes' => 'Sample notes 1',
    ],
        ];

        foreach ($employee_qualifications as $data) {
            EmployeeQualification::firstOrCreate($data);
        }
    }
}
