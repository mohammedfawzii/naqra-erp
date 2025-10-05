<?php

namespace Modules\Training\Database\Seeders\GamificationForTraining;

use Illuminate\Database\Seeder;
use Modules\Training\Models\GamificationForTraining;

class GamificationForTrainingSeeder extends Seeder
{
    public function run(): void
    {
        $gamification_for_trainings = [
            [
                'employeeinfo_id' => 2,
                'training_points' => 365,
                'earned_rewards' => 'Sample earned_rewards 1',
                'progress_level' => 'Sample progress_level 1',
            ],
            [
                'employeeinfo_id' => 3,
                'training_points' => 26,
                'earned_rewards' => 'Sample earned_rewards 2',
                'progress_level' => 'Sample progress_level 2',
            ],
            [
                'employeeinfo_id' => 2,
                'training_points' => 431,
                'earned_rewards' => 'Sample earned_rewards 3',
                'progress_level' => 'Sample progress_level 3',
            ],
            [
                'employeeinfo_id' => 2,
                'training_points' => 347,
                'earned_rewards' => 'Sample earned_rewards 4',
                'progress_level' => 'Sample progress_level 4',
            ],
            [
                'employeeinfo_id' => 3,
                'training_points' => 571,
                'earned_rewards' => 'Sample earned_rewards 5',
                'progress_level' => 'Sample progress_level 5',
            ],
        ];

        foreach ($gamification_for_trainings as $data) {
            GamificationForTraining::firstOrCreate($data);
        }
    }
}
