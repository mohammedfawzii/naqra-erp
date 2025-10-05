<?php

namespace Modules\Training\Database\Seeders\LicensingAndCertificationManagement;

use Illuminate\Database\Seeder;
use Modules\Training\Models\LicensingAndCertificationManagement;

class LicensingAndCertificationManagementSeeder extends Seeder
{
    public function run(): void
    {
        $licensing_and_certification_management = [
            [
                'employeeinfo_id' => 2,
                'license_name' => 'Sample license_name 1',
                'renewal_date' => '2015-09-28',
                'renewal_status' => 'renewed',
            ],
            [
                'employeeinfo_id' => 2,
                'license_name' => 'Sample license_name 2',
                'renewal_date' => '2009-09-28',
                'renewal_status' => 'renewed',
            ],
            [
                'employeeinfo_id' => 3,
                'license_name' => 'Sample license_name 3',
                'renewal_date' => '2020-09-28',
                'renewal_status' => 'renewed',
            ],
            [
                'employeeinfo_id' => 2,
                'license_name' => 'Sample license_name 4',
                'renewal_date' => '2006-09-28',
                'renewal_status' => 'renewed',
            ],
            [
                'employeeinfo_id' => 2,
                'license_name' => 'Sample license_name 5',
                'renewal_date' => '2005-09-28',
                'renewal_status' => 'renewed',
            ],
        ];

        foreach ($licensing_and_certification_management as $data) {
            LicensingAndCertificationManagement::firstOrCreate($data);
        }
    }
}
