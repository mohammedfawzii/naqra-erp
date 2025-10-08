<?php

namespace Modules\Employee\Database\Seeders\EmployeeMedicalRecord;

use Illuminate\Database\Seeder;
use Modules\Employee\Models\EmployeeMedicalRecord;

class EmployeeMedicalRecordSeeder extends Seeder
{
    public function run(): void
    {
        $employee_medical_records = [
            [
                'employee_id' => 3,
                'certificate_number' => 'Sample certificate_number 1',
                'certificate_value' => 43.40,
                'certificate_start_date' => '2016-10-08',
                'certificate_end_date' => '2013-10-08',
                'regular_checkup_date' => '2013-10-08',
                'other_checkup_date' => '2014-10-08',
                'medical_insurance' => 'Sample medical_insurance 1',
                'medical_insurance_category_id' => 3,
                'medical_insurance_value' => 'Sample medical_insurance_value 1',
                'chronic_disease' => 'Sample chronic_disease 1',
                'blood_type' => 'Sample blood_type 1',
                'medical_condition' => 'Sample medical_condition 1',
            ],
            [
                'employee_id' => 3,
                'certificate_number' => 'Sample certificate_number 2',
                'certificate_value' => 53.48,
                'certificate_start_date' => '2017-10-08',
                'certificate_end_date' => '2008-10-08',
                'regular_checkup_date' => '2024-10-08',
                'other_checkup_date' => '2024-10-08',
                'medical_insurance' => 'Sample medical_insurance 2',
                'medical_insurance_category_id' => 1,
                'medical_insurance_value' => 'Sample medical_insurance_value 2',
                'chronic_disease' => 'Sample chronic_disease 2',
                'blood_type' => 'Sample blood_type 2',
                'medical_condition' => 'Sample medical_condition 2',
            ],
            [
                'employee_id' => 3,
                'certificate_number' => 'Sample certificate_number 3',
                'certificate_value' => 48.23,
                'certificate_start_date' => '2013-10-08',
                'certificate_end_date' => '2024-10-08',
                'regular_checkup_date' => '2013-10-08',
                'other_checkup_date' => '2006-10-08',
                'medical_insurance' => 'Sample medical_insurance 3',
                'medical_insurance_category_id' => 2,
                'medical_insurance_value' => 'Sample medical_insurance_value 3',
                'chronic_disease' => 'Sample chronic_disease 3',
                'blood_type' => 'Sample blood_type 3',
                'medical_condition' => 'Sample medical_condition 3',
            ],
            [
                'employee_id' => 3,
                'certificate_number' => 'Sample certificate_number 4',
                'certificate_value' => 88.49,
                'certificate_start_date' => '2010-10-08',
                'certificate_end_date' => '2018-10-08',
                'regular_checkup_date' => '2010-10-08',
                'other_checkup_date' => '2017-10-08',
                'medical_insurance' => 'Sample medical_insurance 4',
                'medical_insurance_category_id' => 1,
                'medical_insurance_value' => 'Sample medical_insurance_value 4',
                'chronic_disease' => 'Sample chronic_disease 4',
                'blood_type' => 'Sample blood_type 4',
                'medical_condition' => 'Sample medical_condition 4',
            ],
            [
                'employee_id' => 2,
                'certificate_number' => 'Sample certificate_number 5',
                'certificate_value' => 75.21,
                'certificate_start_date' => '2024-10-08',
                'certificate_end_date' => '2021-10-08',
                'regular_checkup_date' => '2016-10-08',
                'other_checkup_date' => '2011-10-08',
                'medical_insurance' => 'Sample medical_insurance 5',
                'medical_insurance_category_id' => 3,
                'medical_insurance_value' => 'Sample medical_insurance_value 5',
                'chronic_disease' => 'Sample chronic_disease 5',
                'blood_type' => 'Sample blood_type 5',
                'medical_condition' => 'Sample medical_condition 5',
            ],
        ];

        foreach ($employee_medical_records as $data) {
            EmployeeMedicalRecord::firstOrCreate($data);
        }
    }
}
