<?php

namespace Modules\AttendanceTracking\Database\Seeders\AttendanceCompliance;

use Illuminate\Database\Seeder;
use Modules\AttendanceTracking\Models\AttendanceCompliance;

class AttendanceComplianceSeeder extends Seeder
{
    public function run(): void
    {
        $attendance_compliances = [
            [
                'compliance_type' => 'policy',
                'compliance_status' => 'compliant',
                'review_date' => '2023-09-25',
                                'attendance_attachments_id' => 123,

            ],
            [
                'compliance_type' => 'regulation',
                'compliance_status' => 'under_review',
                'review_date' => '2022-09-25',
                                'attendance_attachments_id' => 123,

            ],
            [
                'compliance_type' => 'internal',
                'compliance_status' => 'non_compliant',
                'review_date' => '2006-09-25',
                                'attendance_attachments_id' => 123,

            ],
            [
                'compliance_type' => 'policy',
                'compliance_status' => 'non_compliant',
                'review_date' => '2016-09-25',
            ],
            [
                'compliance_type' => 'regulation',
                'compliance_status' => 'compliant',
                'review_date' => '2021-09-25',
                                'attendance_attachments_id' => 123,

            ],
        ];

        foreach ($attendance_compliances as $data) {
            AttendanceCompliance::firstOrCreate($data);
        }
    }
}
