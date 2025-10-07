<?php

namespace Modules\Training\Database\Seeders\AIDrivenLearningRecommendation;

use Illuminate\Database\Seeder;
use Modules\Training\Models\AIDrivenLearningRecommendation;

class AIDrivenLearningRecommendationSeeder extends Seeder
{
    public function run(): void
    {
        $a_i_driven_learning_recommendations = [
            [
                'employee_id' => 3,
                'recommended_course' => 'Sample recommended_course 1',
                'recommendation_reason' => 'Sample recommendation_reason 1',
                'fit_score' => 5,
            ],
            [
                'employee_id' => 3,
                'recommended_course' => 'Sample recommended_course 2',
                'recommendation_reason' => 'Sample recommendation_reason 2',
                'fit_score' => 8,
            ],
            [
                'employee_id' => 2,
                'recommended_course' => 'Sample recommended_course 3',
                'recommendation_reason' => 'Sample recommendation_reason 3',
                'fit_score' => 7,
            ],
            [
                'employee_id' => 2,
                'recommended_course' => 'Sample recommended_course 4',
                'recommendation_reason' => 'Sample recommendation_reason 4',
                'fit_score' => 3,
            ],
            [
                'employee_id' => 2,
                'recommended_course' => 'Sample recommended_course 5',
                'recommendation_reason' => 'Sample recommendation_reason 5',
                'fit_score' => 5,
            ],
        ];

        foreach ($a_i_driven_learning_recommendations as $data) {
            AIDrivenLearningRecommendation::firstOrCreate($data);
        }
    }
}
