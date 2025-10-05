<?php

namespace Modules\Performance\Database\Seeders\Feedback;

use Illuminate\Database\Seeder;
use Modules\Performance\Models\Feedback;

class FeedbackSeeder extends Seeder
{
    public function run(): void
    {
        $feedback = [
            [
                'employeeinfo_id' => 2,
                'type' => 'Sample type 1',
                'comment' => 'Sample comment 1',
                'feedback_date' => '2012-09-28',
                'sender_name' => 'Sample sender_name 1',
            ],
            [
                'employeeinfo_id' => 1,
                'type' => 'Sample type 2',
                'comment' => 'Sample comment 2',
                'feedback_date' => '2013-09-28',
                'sender_name' => 'Sample sender_name 2',
            ],
            [
                'employeeinfo_id' => 1,
                'type' => 'Sample type 3',
                'comment' => 'Sample comment 3',
                'feedback_date' => '2007-09-28',
                'sender_name' => 'Sample sender_name 3',
            ],
            [
                'employeeinfo_id' => 1,
                'type' => 'Sample type 4',
                'comment' => 'Sample comment 4',
                'feedback_date' => '2007-09-28',
                'sender_name' => 'Sample sender_name 4',
            ],
            [
                'employeeinfo_id' => 2,
                'type' => 'Sample type 5',
                'comment' => 'Sample comment 5',
                'feedback_date' => '2022-09-28',
                'sender_name' => 'Sample sender_name 5',
            ],
        ];

        foreach ($feedback as $data) {
            Feedback::firstOrCreate($data);
        }
    }
}
