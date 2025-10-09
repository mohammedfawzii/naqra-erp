<?php

namespace Modules\Facilities\Database\Seeders\OwnerForeignCompany;

use Illuminate\Database\Seeder;
use Modules\Facilities\Models\OwnerForeignCompany;

class OwnerForeignCompanySeeder extends Seeder
{
    public function run(): void
    {
        $owner_foreign_companies = [
            [
                'owner_id' => 1,
                'company_name' => 'Sample company_name 1',
                'license_number' => 'Sample license_number 1',
                'issue_date' => '2018-10-08',
                'email' => 'Sample email 1',
                'mobile' => 'Sample mobile 1',
                'address' => 'Sample address 1',
                'partnership_percentage' => 917,
                'authorized_person' => 'Sample authorized_person 1',
                'authorized_email' => 'Sample authorized_email 1',
                'authorized_mobile' => 'Sample authorized_mobile 1',
                'landline' => 'Sample landline 1',
                'website' => 'Sample website 1',
                'partnership_type' => 'Sample partnership_type 1',
                'note' => 'Sample note 1',
            ],
            [
                'owner_id' => 2,
                'company_name' => 'Sample company_name 2',
                'license_number' => 'Sample license_number 2',
                'issue_date' => '2014-10-08',
                'email' => 'Sample email 2',
                'mobile' => 'Sample mobile 2',
                'address' => 'Sample address 2',
                'partnership_percentage' => 72,
                'authorized_person' => 'Sample authorized_person 2',
                'authorized_email' => 'Sample authorized_email 2',
                'authorized_mobile' => 'Sample authorized_mobile 2',
                'landline' => 'Sample landline 2',
                'website' => 'Sample website 2',
                'partnership_type' => 'Sample partnership_type 2',
                'note' => 'Sample note 2',
            ],
            [
                'owner_id' => 2,
                'company_name' => 'Sample company_name 3',
                'license_number' => 'Sample license_number 3',
                'issue_date' => '2010-10-08',
                'email' => 'Sample email 3',
                'mobile' => 'Sample mobile 3',
                'address' => 'Sample address 3',
                'partnership_percentage' => 644,
                'authorized_person' => 'Sample authorized_person 3',
                'authorized_email' => 'Sample authorized_email 3',
                'authorized_mobile' => 'Sample authorized_mobile 3',
                'landline' => 'Sample landline 3',
                'website' => 'Sample website 3',
                'partnership_type' => 'Sample partnership_type 3',
                'note' => 'Sample note 3',
            ],
            [
                'owner_id' => 3,
                'company_name' => 'Sample company_name 4',
                'license_number' => 'Sample license_number 4',
                'issue_date' => '2024-10-08',
                'email' => 'Sample email 4',
                'mobile' => 'Sample mobile 4',
                'address' => 'Sample address 4',
                'partnership_percentage' => 561,
                'authorized_person' => 'Sample authorized_person 4',
                'authorized_email' => 'Sample authorized_email 4',
                'authorized_mobile' => 'Sample authorized_mobile 4',
                'landline' => 'Sample landline 4',
                'website' => 'Sample website 4',
                'partnership_type' => 'Sample partnership_type 4',
                'note' => 'Sample note 4',
            ],
            [
                'owner_id' => 2,
                'company_name' => 'Sample company_name 5',
                'license_number' => 'Sample license_number 5',
                'issue_date' => '2016-10-08',
                'email' => 'Sample email 5',
                'mobile' => 'Sample mobile 5',
                'address' => 'Sample address 5',
                'partnership_percentage' => 67,
                'authorized_person' => 'Sample authorized_person 5',
                'authorized_email' => 'Sample authorized_email 5',
                'authorized_mobile' => 'Sample authorized_mobile 5',
                'landline' => 'Sample landline 5',
                'website' => 'Sample website 5',
                'partnership_type' => 'Sample partnership_type 5',
                'note' => 'Sample note 5',
            ],
        ];

        foreach ($owner_foreign_companies as $data) {
            OwnerForeignCompany::firstOrCreate($data);
        }
    }
}
