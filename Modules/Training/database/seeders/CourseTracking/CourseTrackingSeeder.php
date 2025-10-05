<?php

namespace Modules\Training\Database\Seeders\CourseTracking;

use Illuminate\Database\Seeder;
use Modules\Training\Models\CourseTracking;

class CourseTrackingSeeder extends Seeder
{
    public function run(): void
    {
        $course_trackings = [
            [
                'employeeinfo_id' => 1,
                'course_id' => 3,
                'status' => 'not_started',
                'completion_date' => '2021-09-28',
                'progress_percentage' => 1,
            ],
            [
                'employeeinfo_id' => 2,
                'course_id' => 1,
                'status' => 'not_started',
                'completion_date' => '2017-09-28',
                'progress_percentage' => 1,
            ],
            [
                'employeeinfo_id' => 2,
                'course_id' => 2,
                'status' => 'not_started',
                'completion_date' => '2010-09-28',
                'progress_percentage' => 1,
            ],
            [
                'employeeinfo_id' => 2,
                'course_id' => 3,
                'status' => 'not_started',
                'completion_date' => '2012-09-28',
                'progress_percentage' => 1,
            ],
            [
                'employeeinfo_id' => 2,
                'course_id' => 1,
                'status' => 'not_started',
                'completion_date' => '2020-09-28',
                'progress_percentage' => 1,
            ],
        ];

        foreach ($course_trackings as $data) {
            CourseTracking::firstOrCreate($data);
        }
    }
}
