<?php

namespace Modules\AttendanceTracking\Database\Seeders\BiometricIntegration;

use Illuminate\Database\Seeder;
use Modules\AttendanceTracking\Models\BiometricIntegration;

class BiometricIntegrationSeeder extends Seeder
{
    public function run(): void
    {

        $biometrics = [
            [
                'employee_id' => 1,
                'biometric_type' => 'fingerprint',
                'registration_date' => '2022-05-10',
                                'attendance_attachments_id' => 123,

            ],
            [
                'employee_id' => 2,
                'biometric_type' => 'face',
                'registration_date' => '2023-01-15',
                                'attendance_attachments_id' => 123,

            ],
            [
                'employee_id' => 3,
                'biometric_type' => 'iris',
                                'attendance_attachments_id' => 123,

                'registration_date' => '2021-09-20',
            ],
            [
                'employee_id' => 4,
                'biometric_type' => 'voice',
                'registration_date' => '2020-12-01',
                                'attendance_attachments_id' => 123,

            ],
            [
                'employee_id' => 5,
                'biometric_type' => 'fingerprint',
                'registration_date' => '2024-03-18',
                                'attendance_attachments_id' => 123,

            ],
        ];

        foreach ($biometrics as $data) {
            BiometricIntegration::firstOrCreate($data);
        }
    }
}
