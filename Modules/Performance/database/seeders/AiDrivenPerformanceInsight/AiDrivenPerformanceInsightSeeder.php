<?php

namespace Modules\Performance\Database\Seeders\AiDrivenPerformanceInsight;

use Illuminate\Database\Seeder;
use Modules\Performance\Models\AiDrivenPerformanceInsight;

class AiDrivenPerformanceInsightSeeder extends Seeder
{
    public function run(): void
    {
        $ai_driven_performance_insights = [
            [
                'employeeinfo_id' => 3,
                'ai_recommendation' => 'Sample ai_recommendation 1',
                'probability_score' => 78.13,
                'analysis_date' => '2010-09-28',
            ],
            [
                'employeeinfo_id' => 1,
                'ai_recommendation' => 'Sample ai_recommendation 2',
                'probability_score' => 29.83,
                'analysis_date' => '2007-09-28',
            ],
            [
                'employeeinfo_id' => 3,
                'ai_recommendation' => 'Sample ai_recommendation 3',
                'probability_score' => 62.46,
                'analysis_date' => '2022-09-28',
            ],
            [
                'employeeinfo_id' => 2,
                'ai_recommendation' => 'Sample ai_recommendation 4',
                'probability_score' => 37.29,
                'analysis_date' => '2016-09-28',
            ],
            [
                'employeeinfo_id' => 3,
                'ai_recommendation' => 'Sample ai_recommendation 5',
                'probability_score' => 35.89,
                'analysis_date' => '2008-09-28',
            ],
        ];

        foreach ($ai_driven_performance_insights as $data) {
            AiDrivenPerformanceInsight::firstOrCreate($data);
        }
    }
}
