<?php

namespace Modules\Training\Database\Seeders\TrainingEvaluation;

use Illuminate\Database\Seeder;
use Modules\Training\Models\TrainingEvaluation;

class TrainingEvaluationSeeder extends Seeder
{
    public function run(): void
    {
        $training_evaluations = [
            [
                'employeeinfo_id' => 1,
                'course_id' => 1,
                'rating' => 1,
                'feedback' => 'Sample feedback 1',
                'satisfaction_level' => 'very_low',
            ],
            [
                'employeeinfo_id' => 1,
                'course_id' => 2,
                'rating' => 1,
                'feedback' => 'Sample feedback 2',
                'satisfaction_level' => 'very_low',
            ],
            [
                'employeeinfo_id' => 1,
                'course_id' => 1,
                'rating' => 1,
                'feedback' => 'Sample feedback 3',
                'satisfaction_level' => 'very_low',
            ],
            [
                'employeeinfo_id' => 2,
                'course_id' => 1,
                'rating' => 1,
                'feedback' => 'Sample feedback 4',
                'satisfaction_level' => 'very_low',
            ],
            [
                'employeeinfo_id' => 3,
                'course_id' => 1,
                'rating' => 1,
                'feedback' => 'Sample feedback 5',
                'satisfaction_level' => 'very_low',
            ],
        ];

        foreach ($training_evaluations as $data) {
            TrainingEvaluation::firstOrCreate($data);
        }
    }
}
