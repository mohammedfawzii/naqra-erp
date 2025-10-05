<?php

namespace Modules\AttendanceTracking\Database\Seeders\AiAttendanceInsight;

use Illuminate\Database\Seeder;
use Modules\AttendanceTracking\Models\AiAttendanceInsight;

class AiAttendanceInsightSeeder extends Seeder
{
    public function run(): void
    {
        $ai_attendance_insights = [
            [
                'employee_id' => 3,
                'ai_recommendation' => 'Sample ai_recommendation 1',
                'probability_score' => 11.29,
                'analysis_date' => '2023-09-25',
                'attendance_attachments_id' => 3,
            ],
            [
                'employee_id' => 2,
                'ai_recommendation' => 'Sample ai_recommendation 2',
                'probability_score' => 46.47,
                'analysis_date' => '2012-09-25',
                'attendance_attachments_id' => 1,
            ],
            [
                'employee_id' => 3,
                'ai_recommendation' => 'Sample ai_recommendation 3',
                'probability_score' => 4.80,
                'analysis_date' => '2017-09-25',
                'attendance_attachments_id' => 3,
            ],
            [
                'employee_id' => 2,
                'ai_recommendation' => 'Sample ai_recommendation 4',
                'probability_score' => 20.04,
                'analysis_date' => '2008-09-25',
                'attendance_attachments_id' => 2,
            ],
            [
                'employee_id' => 2,
                'ai_recommendation' => 'Sample ai_recommendation 5',
                'probability_score' => 88.23,
                'analysis_date' => '2006-09-25',
                'attendance_attachments_id' => 2,
            ],
        ];

        foreach ($ai_attendance_insights as $data) {
            AiAttendanceInsight::firstOrCreate($data);
        }
    }
}
