<?php

namespace Modules\Performance\Database\Seeders\Feedback360;

use Illuminate\Database\Seeder;
use Modules\Performance\Models\Feedback360;

class Feedback360Seeder extends Seeder
{
    public function run(): void
    {
        $feedback360s = [
            [
                'employeeinfo_id' => 1,
                'evaluator_name' => 'Sample evaluator_name 1',
                'evaluator_designation' => 'Sample evaluator_designation 1',
                'rating' => 23.74,
                'comment' => 'Sample comment 1',
                'source' => 'Sample source 1',
            ],
            [
                'employeeinfo_id' => 1,
                'evaluator_name' => 'Sample evaluator_name 2',
                'evaluator_designation' => 'Sample evaluator_designation 2',
                'rating' => 71.80,
                'comment' => 'Sample comment 2',
                'source' => 'Sample source 2',
            ],
            [
                'employeeinfo_id' => 1,
                'evaluator_name' => 'Sample evaluator_name 3',
                'evaluator_designation' => 'Sample evaluator_designation 3',
                'rating' => 40.60,
                'comment' => 'Sample comment 3',
                'source' => 'Sample source 3',
            ],
            [
                'employeeinfo_id' => 3,
                'evaluator_name' => 'Sample evaluator_name 4',
                'evaluator_designation' => 'Sample evaluator_designation 4',
                'rating' => 92.65,
                'comment' => 'Sample comment 4',
                'source' => 'Sample source 4',
            ],
            [
                'employeeinfo_id' => 3,
                'evaluator_name' => 'Sample evaluator_name 5',
                'evaluator_designation' => 'Sample evaluator_designation 5',
                'rating' => 74.54,
                'comment' => 'Sample comment 5',
                'source' => 'Sample source 5',
            ],
        ];

        foreach ($feedback360s as $data) {
            Feedback360::firstOrCreate($data);
        }
    }
}
