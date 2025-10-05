<?php

namespace Modules\Performance\Database\Seeders\PromotionReward;

use Illuminate\Database\Seeder;
use Modules\Performance\Models\PromotionReward;

class PromotionRewardSeeder extends Seeder
{
    public function run(): void
    {
        $promotion_rewards = [
            [
                'employeeinfo_id' => 3,
                'reward_type' => 'Sample reward_type 1',
                'reward_date' => '2012-09-28',
            ],
            [
                'employeeinfo_id' => 3,
                'reward_type' => 'Sample reward_type 2',
                'reward_date' => '2015-09-28',
            ],
            [
                'employeeinfo_id' => 1,
                'reward_type' => 'Sample reward_type 3',
                'reward_date' => '2023-09-28',
            ],
            [
                'employeeinfo_id' => 2,
                'reward_type' => 'Sample reward_type 4',
                'reward_date' => '2021-09-28',
            ],
            [
                'employeeinfo_id' => 1,
                'reward_type' => 'Sample reward_type 5',
                'reward_date' => '2021-09-28',
            ],
        ];

        foreach ($promotion_rewards as $data) {
            PromotionReward::firstOrCreate($data);
        }
    }
}
