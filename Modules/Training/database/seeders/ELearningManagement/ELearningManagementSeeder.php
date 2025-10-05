<?php

namespace Modules\Training\Database\Seeders\ELearningManagement;

use Illuminate\Database\Seeder;
use Modules\Training\Models\ELearningManagement;

class ELearningManagementSeeder extends Seeder
{
    public function run(): void
    {
        $e_learning_management = [
            [
                'employeeinfo_id' => 1,
                'course_link' => 'Sample course_link 1',
                'progress' => 3,
                'completion_time' => '14:08:00',
            ],
            [
                'employeeinfo_id' => 3,
                'course_link' => 'Sample course_link 2',
                'progress' => 7,
                'completion_time' => '15:20:00',
            ],
            [
                'employeeinfo_id' => 2,
                'course_link' => 'Sample course_link 3',
                'progress' => 0,
                'completion_time' => '12:41:00',
            ],
            [
                'employeeinfo_id' => 2,
                'course_link' => 'Sample course_link 4',
                'progress' => 4,
                'completion_time' => '16:58:00',
            ],
            [
                'employeeinfo_id' => 3,
                'course_link' => 'Sample course_link 5',
                'progress' => 4,
                'completion_time' => '13:46:00',
            ],
        ];

        foreach ($e_learning_management as $data) {
            ELearningManagement::firstOrCreate($data);
        }
    }
}
