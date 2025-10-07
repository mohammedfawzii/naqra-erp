<?php

namespace Modules\Training\Database\Seeders\TrainingNeedsAssessment;

use Illuminate\Database\Seeder;
use Modules\Training\Models\TrainingNeedsAssessment;

class TrainingNeedsAssessmentSeeder extends Seeder
{
    public function run(): void
    {
        $training_needs_assessments = [
            [
                'employee_id' => 1,
                'needs' => 'Sample needs 1',
                'needs_priority' => 'high',
                'needs_source' => 'Sample needs_source 1',
            ],
            [
                'employee_id' => 3,
                'needs' => 'Sample needs 2',
                'needs_priority' => 'high',
                'needs_source' => 'Sample needs_source 2',
            ],
            [
                'employee_id' => 3,
                'needs' => 'Sample needs 3',
                'needs_priority' => 'high',
                'needs_source' => 'Sample needs_source 3',
            ],
            [
                'employee_id' => 3,
                'needs' => 'Sample needs 4',
                'needs_priority' => 'high',
                'needs_source' => 'Sample needs_source 4',
            ],
            [
                'employee_id' => 3,
                'needs' => 'Sample needs 5',
                'needs_priority' => 'high',
                'needs_source' => 'Sample needs_source 5',
            ],
        ];

        foreach ($training_needs_assessments as $data) {
            TrainingNeedsAssessment::firstOrCreate($data);
        }
    }
}
