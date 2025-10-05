<?php

namespace Modules\Payroll\Database\Seeders\EndofServiceCalculations;

use Illuminate\Database\Seeder;
use Modules\Payroll\Models\EndofServiceCalculations;

class EndofServiceCalculationsSeeder extends Seeder
{
    public function run(): void
    {
        $endof_service_calculations = [
            [
                'employee_id' => 2,
                'service_duration' => 131,
                'end_of_service_amount' => 54.39,
                'end_date' => '2022-09-23',
                'calculation_status' => 'pending',
                'payroll_attachments_id' => 2,
            ],
            [
                'employee_id' => 1,
                'service_duration' => 436,
                'end_of_service_amount' => 50.35,
                'end_date' => '2007-09-23',
                'calculation_status' => 'pending',
                'payroll_attachments_id' => 3,
            ],
            [
                'employee_id' => 2,
                'service_duration' => 277,
                'end_of_service_amount' => 17.34,
                'end_date' => '2015-09-23',
                'calculation_status' => 'pending',
                'payroll_attachments_id' => 2,
            ],
            [
                'employee_id' => 3,
                'service_duration' => 580,
                'end_of_service_amount' => 81.30,
                'end_date' => '2005-09-23',
                'calculation_status' => 'pending',
                'payroll_attachments_id' => 1,
            ],
            [
                'employee_id' => 2,
                'service_duration' => 252,
                'end_of_service_amount' => 58.51,
                'end_date' => '2023-09-23',
                'calculation_status' => 'pending',
                'payroll_attachments_id' => 3,
            ],
        ];

        foreach ($endof_service_calculations as $data) {
            EndofServiceCalculations::firstOrCreate($data);
        }
    }
}
