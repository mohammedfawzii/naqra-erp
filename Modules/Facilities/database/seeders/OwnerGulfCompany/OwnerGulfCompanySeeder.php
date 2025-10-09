<?php

namespace Modules\Facilities\Database\Seeders\OwnerGulfCompany;

use Illuminate\Database\Seeder;
use Modules\Facilities\Models\OwnerGulfCompany;

class OwnerGulfCompanySeeder extends Seeder
{
    public function run(): void
    {
        $owner_gulf_companies = [
            [
                'owner_id' => 2,
                'gulf_commercial_number' => 'Sample gulf_commercial_number 1',
                'name' => [
                    'en' => 'Sample name 1',
                    'ar' => 'عينة name 1'
                ],
                'company_type' => 'Sample company_type 1',
                'company_status' => 'Sample company_status 1',
                'company_nationality' => 'Sample company_nationality 1',
                'email' => 'Sample email 1',
                'landline' => 'Sample landline 1',
                'website' => 'Sample website 1',
                'authorized_person' => 'Sample authorized_person 1',
                'authorized_email' => 'Sample authorized_email 1',
                'authorized_mobile' => 'Sample authorized_mobile 1',
                'unified_phone' => 'Sample unified_phone 1',
                'partnership_type' => 'Sample partnership_type 1',
                'partnership_percentage' => 95,
                'note' => 'Sample note 1',
            ],
            [
                'owner_id' => 1,
                'gulf_commercial_number' => 'Sample gulf_commercial_number 2',
                'name' => [
                    'en' => 'Sample name 2',
                    'ar' => 'عينة name 2'
                ],
                'company_type' => 'Sample company_type 2',
                'company_status' => 'Sample company_status 2',
                'company_nationality' => 'Sample company_nationality 2',
                'email' => 'Sample email 2',
                'landline' => 'Sample landline 2',
                'website' => 'Sample website 2',
                'authorized_person' => 'Sample authorized_person 2',
                'authorized_email' => 'Sample authorized_email 2',
                'authorized_mobile' => 'Sample authorized_mobile 2',
                'unified_phone' => 'Sample unified_phone 2',
                'partnership_type' => 'Sample partnership_type 2',
                'partnership_percentage' => 227,
                'note' => 'Sample note 2',
            ],
            [
                'owner_id' => 1,
                'gulf_commercial_number' => 'Sample gulf_commercial_number 3',
                'name' => [
                    'en' => 'Sample name 3',
                    'ar' => 'عينة name 3'
                ],
                'company_type' => 'Sample company_type 3',
                'company_status' => 'Sample company_status 3',
                'company_nationality' => 'Sample company_nationality 3',
                'email' => 'Sample email 3',
                'landline' => 'Sample landline 3',
                'website' => 'Sample website 3',
                'authorized_person' => 'Sample authorized_person 3',
                'authorized_email' => 'Sample authorized_email 3',
                'authorized_mobile' => 'Sample authorized_mobile 3',
                'unified_phone' => 'Sample unified_phone 3',
                'partnership_type' => 'Sample partnership_type 3',
                'partnership_percentage' => 45,
                'note' => 'Sample note 3',
            ],
            [
                'owner_id' => 3,
                'gulf_commercial_number' => 'Sample gulf_commercial_number 4',
                'name' => [
                    'en' => 'Sample name 4',
                    'ar' => 'عينة name 4'
                ],
                'company_type' => 'Sample company_type 4',
                'company_status' => 'Sample company_status 4',
                'company_nationality' => 'Sample company_nationality 4',
                'email' => 'Sample email 4',
                'landline' => 'Sample landline 4',
                'website' => 'Sample website 4',
                'authorized_person' => 'Sample authorized_person 4',
                'authorized_email' => 'Sample authorized_email 4',
                'authorized_mobile' => 'Sample authorized_mobile 4',
                'unified_phone' => 'Sample unified_phone 4',
                'partnership_type' => 'Sample partnership_type 4',
                'partnership_percentage' => 257,
                'note' => 'Sample note 4',
            ],
            [
                'owner_id' => 3,
                'gulf_commercial_number' => 'Sample gulf_commercial_number 5',
                'name' => [
                    'en' => 'Sample name 5',
                    'ar' => 'عينة name 5'
                ],
                'company_type' => 'Sample company_type 5',
                'company_status' => 'Sample company_status 5',
                'company_nationality' => 'Sample company_nationality 5',
                'email' => 'Sample email 5',
                'landline' => 'Sample landline 5',
                'website' => 'Sample website 5',
                'authorized_person' => 'Sample authorized_person 5',
                'authorized_email' => 'Sample authorized_email 5',
                'authorized_mobile' => 'Sample authorized_mobile 5',
                'unified_phone' => 'Sample unified_phone 5',
                'partnership_type' => 'Sample partnership_type 5',
                'partnership_percentage' => 754,
                'note' => 'Sample note 5',
            ],
        ];

        foreach ($owner_gulf_companies as $data) {
            OwnerGulfCompany::firstOrCreate($data);
        }
    }
}
