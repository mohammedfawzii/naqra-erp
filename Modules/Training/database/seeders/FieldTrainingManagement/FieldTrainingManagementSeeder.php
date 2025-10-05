<?php

namespace Modules\Training\Database\Seeders\FieldTrainingManagement;

use Illuminate\Database\Seeder;
use Modules\Training\Models\FieldTrainingManagement;

class FieldTrainingManagementSeeder extends Seeder
{
    public function run(): void
    {
        $field_training_management = [
            [
                'employeeinfo_id' => 2,
                'training_description' => 'Sample training_description 1',
                'training_location' => 'Sample training_location 1',
                'duration' => 686,
                'status' => 'planned',
            ],
            [
                'employeeinfo_id' => 3,
                'training_description' => 'Sample training_description 2',
                'training_location' => 'Sample training_location 2',
                'duration' => 999,
                'status' => 'planned',
            ],
            [
                'employeeinfo_id' => 1,
                'training_description' => 'Sample training_description 3',
                'training_location' => 'Sample training_location 3',
                'duration' => 477,
                'status' => 'planned',
            ],
            [
                'employeeinfo_id' => 2,
                'training_description' => 'Sample training_description 4',
                'training_location' => 'Sample training_location 4',
                'duration' => 617,
                'status' => 'planned',
            ],
            [
                'employeeinfo_id' => 1,
                'training_description' => 'Sample training_description 5',
                'training_location' => 'Sample training_location 5',
                'duration' => 563,
                'status' => 'planned',
            ],
        ];

        foreach ($field_training_management as $data) {
            FieldTrainingManagement::firstOrCreate($data);
        }
    }
}
