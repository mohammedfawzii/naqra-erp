<?php

namespace Modules\Training\Database\Seeders\InternalTrainingManagement;

use Illuminate\Database\Seeder;
use Modules\Training\Models\InternalTrainingManagement;

class InternalTrainingManagementSeeder extends Seeder
{
    public function run(): void
    {
        $internal_training_management = [
            [
                'employeeinfo_id' => 1,
                'course_id' => 1,
                'trainer_name' => 'Sample trainer_name 1',
                'location' => 'Sample location 1',
            ],
            [
                'employeeinfo_id' => 3,
                'course_id' => 1,
                'trainer_name' => 'Sample trainer_name 2',
                'location' => 'Sample location 2',
            ],
            [
                'employeeinfo_id' => 3,
                'course_id' => 2,
                'trainer_name' => 'Sample trainer_name 3',
                'location' => 'Sample location 3',
            ],
            [
                'employeeinfo_id' => 1,
                'course_id' => 2,
                'trainer_name' => 'Sample trainer_name 4',
                'location' => 'Sample location 4',
            ],
            [
                'employeeinfo_id' => 3,
                'course_id' => 1,
                'trainer_name' => 'Sample trainer_name 5',
                'location' => 'Sample location 5',
            ],
        ];

        foreach ($internal_training_management as $data) {
            InternalTrainingManagement::firstOrCreate($data);
        }
    }
}
