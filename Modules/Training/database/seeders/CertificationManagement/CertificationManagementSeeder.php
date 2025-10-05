<?php

namespace Modules\Training\Database\Seeders\CertificationManagement;

use Illuminate\Database\Seeder;
use Modules\Training\Models\CertificationManagement;

class CertificationManagementSeeder extends Seeder
{
    public function run(): void
    {
        $certification_management = [
            [
                'employeeinfo_id' => 3,
                'certification_name' => 'Sample certification_name 1',
                'issue_date' => '2005-09-28',
                'expiration_date' => '2011-09-28',
                'certification_status' => 'valid',
            ],
            [
                'employeeinfo_id' => 2,
                'certification_name' => 'Sample certification_name 2',
                'issue_date' => '2015-09-28',
                'expiration_date' => '2023-09-28',
                'certification_status' => 'valid',
            ],
            [
                'employeeinfo_id' => 1,
                'certification_name' => 'Sample certification_name 3',
                'issue_date' => '2021-09-28',
                'expiration_date' => '2014-09-28',
                'certification_status' => 'valid',
            ],
            [
                'employeeinfo_id' => 3,
                'certification_name' => 'Sample certification_name 4',
                'issue_date' => '2022-09-28',
                'expiration_date' => '2013-09-28',
                'certification_status' => 'valid',
            ],
            [
                'employeeinfo_id' => 1,
                'certification_name' => 'Sample certification_name 5',
                'issue_date' => '2023-09-28',
                'expiration_date' => '2018-09-28',
                'certification_status' => 'valid',
            ],
        ];

        foreach ($certification_management as $data) {
            CertificationManagement::firstOrCreate($data);
        }
    }
}
