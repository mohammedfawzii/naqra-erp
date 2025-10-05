<?php

namespace Modules\Performance\Database\Seeders;

use Illuminate\Database\Seeder;

class PerformanceDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(LearningManagementIntegration\LearningManagementIntegrationSeeder::class);
        $this->call(AiDrivenPerformanceInsight\AiDrivenPerformanceInsightSeeder::class);
        $this->call(EmployeeRecognitionManagement\EmployeeRecognitionManagementSeeder::class);
        $this->call(ContinuousPerformanceManagement\ContinuousPerformanceManagementSeeder::class);
        $this->call(CompetencyManagement\CompetencyManagementSeeder::class);
        $this->call(SuccessionPlanning\SuccessionPlanningSeeder::class);
        $this->call(PromotionReward\PromotionRewardSeeder::class);
        $this->call(Feedback360\Feedback360Seeder::class);
        $this->call(DevelopmentPlan\DevelopmentPlanSeeder::class);
        $this->call(Feedback\FeedbackSeeder::class);
        $this->call(Evaluation\EvaluationSeeder::class);
        $this->call(Goal\GoalSeeder::class);
        $this->call([
            InfoSeeder::class,
            ColumnsSeeder::class,
        ]);
    }
}
