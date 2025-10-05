<?php

namespace Modules\Performance\Database\Seeders\Goal;

use Illuminate\Database\Seeder;
use Modules\Performance\Models\Goal;
class GoalSeeder extends Seeder
{
    public function run(): void
    {
        $goals = [
            [
                'employeeinfo_id' => 3,
                'goal_name' => 'Improve Sales Performance',
                'goal_description' => 'Increase sales by 20% over the next quarter.',
                'goal_measure' => 20,
                'start_date' => '2023-01-01',
                'end_date' => '2023-03-31',
                'goal_status' => 'pending',
                'goal_priority' => 'high',
            ],
            [
                'employeeinfo_id' => 1,
                'goal_name' => 'Enhance Customer Satisfaction',
                'goal_description' => 'Reach 95% positive customer feedback.',
                'goal_measure' => 95,
                'start_date' => '2023-02-01',
                'end_date' => '2023-06-30',
                'goal_status' => 'in_progress',
                'goal_priority' => 'medium',
            ],
            [
                'employeeinfo_id' => 2,
                'goal_name' => 'Reduce Employee Turnover',
                'goal_description' => 'Decrease turnover by 10% in one year.',
                'goal_measure' => 10,
                'start_date' => '2023-01-01',
                'end_date' => '2023-12-31',
                'goal_status' => 'completed',
                'goal_priority' => 'low',
            ],
        ];

        foreach ($goals as $data) {
            Goal::firstOrCreate([
                'employeeinfo_id' => $data['employeeinfo_id'],
                'goal_name' => $data['goal_name'],
            ], $data);
        }
    }
}
