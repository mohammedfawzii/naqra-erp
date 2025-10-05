<?php

namespace Modules\Performance\Database\Seeders\EmployeeRecognitionManagement;

use Illuminate\Database\Seeder;
use Modules\Performance\Models\EmployeeRecognitionManagement;

class EmployeeRecognitionManagementSeeder extends Seeder
{
    public function run(): void
    {
        $employee_recognition_management = [
            [
                'employeeinfo_id' => 1,
                'recognition_type' => 'Sample recognition_type 1',
                'recognition_description' => 'Sample recognition_description 1',
                'recognition_date' => '2013-09-28',
            ],
            [
                'employeeinfo_id' => 1,
                'recognition_type' => 'Sample recognition_type 2',
                'recognition_description' => 'Sample recognition_description 2',
                'recognition_date' => '2022-09-28',
            ],
            [
                'employeeinfo_id' => 3,
                'recognition_type' => 'Sample recognition_type 3',
                'recognition_description' => 'Sample recognition_description 3',
                'recognition_date' => '2008-09-28',
            ],
            [
                'employeeinfo_id' => 1,
                'recognition_type' => 'Sample recognition_type 4',
                'recognition_description' => 'Sample recognition_description 4',
                'recognition_date' => '2014-09-28',
            ],
            [
                'employeeinfo_id' => 1,
                'recognition_type' => 'Sample recognition_type 5',
                'recognition_description' => 'Sample recognition_description 5',
                'recognition_date' => '2024-09-28',
            ],
        ];

        foreach ($employee_recognition_management as $data) {
            EmployeeRecognitionManagement::firstOrCreate($data);
        }
    }
}
