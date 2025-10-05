<?php

namespace Modules\AttendanceTracking\Database\Seeders\GamificationAttendance;

use Illuminate\Database\Seeder;
use Modules\AttendanceTracking\Models\GamificationAttendance;

class GamificationAttendanceSeeder extends Seeder
{
    public function run(): void
    {
        $gamification_attendances = [
            [
                'employee_id' => 3,
                'attendance_points' => 374,
                'earned_rewards' => 'Sample earned_rewards 1',
                'progress_level' => 'Sample progress_level 1',
                'attendance_attachments_id' => 1,
            ],
            [
                'employee_id' => 3,
                'attendance_points' => 158,
                'earned_rewards' => 'Sample earned_rewards 2',
                'progress_level' => 'Sample progress_level 2',
                'attendance_attachments_id' => 2,
            ],
            [
                'employee_id' => 3,
                'attendance_points' => 198,
                'earned_rewards' => 'Sample earned_rewards 3',
                'progress_level' => 'Sample progress_level 3',
                'attendance_attachments_id' => 2,
            ],
            [
                'employee_id' => 3,
                'attendance_points' => 473,
                'earned_rewards' => 'Sample earned_rewards 4',
                'progress_level' => 'Sample progress_level 4',
                'attendance_attachments_id' => 1,
            ],
            [
                'employee_id' => 3,
                'attendance_points' => 903,
                'earned_rewards' => 'Sample earned_rewards 5',
                'progress_level' => 'Sample progress_level 5',
                'attendance_attachments_id' => 3,
            ],
        ];

        foreach ($gamification_attendances as $data) {
            GamificationAttendance::firstOrCreate($data);
        }
    }
}
