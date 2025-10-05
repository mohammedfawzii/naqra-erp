<?php

namespace Modules\CmsErp\Database\Seeders\Attendance;

use Illuminate\Database\Seeder;
use Modules\CmsErp\Models\Attendance;

class AttendanceSeeder extends Seeder
{
    public function run(): void
    {
        $attendances = [
            [
                'time' => '1',
                'type' => 'check_in',
            ],
            [
                'time' => '2',
                'type' => 'check_in',
            ],
            [
                'time' => '3',
                'type' => 'check_in',
            ],
            [
                'time' => '4',
                'type' => 'check_in',
            ],
            [
                'time' => '5',
                'type' => 'check_in',
            ],
        ];

        foreach ($attendances as $data) {
            Attendance::firstOrCreate($data);
        }
    }
}
