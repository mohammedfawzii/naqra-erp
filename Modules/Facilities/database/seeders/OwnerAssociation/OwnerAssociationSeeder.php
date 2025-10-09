<?php

namespace Modules\Facilities\Database\Seeders\OwnerAssociation;

use Illuminate\Database\Seeder;
use Modules\Facilities\Models\OwnerAssociation;

class OwnerAssociationSeeder extends Seeder
{
    public function run(): void
    {
        $owner_associations = [
            [
                'owner_id' => 1,
                'association_name' => 'Sample association_name 1',
                'license_number' => 'Sample license_number 1',
                'establishment_date' => '2021-10-08',
                'license_expiry_date' => '2014-10-08',
                'email' => 'Sample email 1',
                'national_address' => 'Sample national_address 1',
                'authorized_person' => 'Sample authorized_person 1',
                'authorized_email' => 'Sample authorized_email 1',
                'authorized_mobile' => 'Sample authorized_mobile 1',
                'landline' => 'Sample landline 1',
                'website' => 'Sample website 1',
                'partnership_percentage' => 224,
                'partnership_type' => 'Sample partnership_type 1',
                'note' => 'Sample note 1',
            ],
            [
                'owner_id' => 1,
                'association_name' => 'Sample association_name 2',
                'license_number' => 'Sample license_number 2',
                'establishment_date' => '2016-10-08',
                'license_expiry_date' => '2023-10-08',
                'email' => 'Sample email 2',
                'national_address' => 'Sample national_address 2',
                'authorized_person' => 'Sample authorized_person 2',
                'authorized_email' => 'Sample authorized_email 2',
                'authorized_mobile' => 'Sample authorized_mobile 2',
                'landline' => 'Sample landline 2',
                'website' => 'Sample website 2',
                'partnership_percentage' => 669,
                'partnership_type' => 'Sample partnership_type 2',
                'note' => 'Sample note 2',
            ],
            [
                'owner_id' => 1,
                'association_name' => 'Sample association_name 3',
                'license_number' => 'Sample license_number 3',
                'establishment_date' => '2015-10-08',
                'license_expiry_date' => '2022-10-08',
                'email' => 'Sample email 3',
                'national_address' => 'Sample national_address 3',
                'authorized_person' => 'Sample authorized_person 3',
                'authorized_email' => 'Sample authorized_email 3',
                'authorized_mobile' => 'Sample authorized_mobile 3',
                'landline' => 'Sample landline 3',
                'website' => 'Sample website 3',
                'partnership_percentage' => 567,
                'partnership_type' => 'Sample partnership_type 3',
                'note' => 'Sample note 3',
            ],
            [
                'owner_id' => 3,
                'association_name' => 'Sample association_name 4',
                'license_number' => 'Sample license_number 4',
                'establishment_date' => '2010-10-08',
                'license_expiry_date' => '2024-10-08',
                'email' => 'Sample email 4',
                'national_address' => 'Sample national_address 4',
                'authorized_person' => 'Sample authorized_person 4',
                'authorized_email' => 'Sample authorized_email 4',
                'authorized_mobile' => 'Sample authorized_mobile 4',
                'landline' => 'Sample landline 4',
                'website' => 'Sample website 4',
                'partnership_percentage' => 246,
                'partnership_type' => 'Sample partnership_type 4',
                'note' => 'Sample note 4',
            ],
            [
                'owner_id' => 3,
                'association_name' => 'Sample association_name 5',
                'license_number' => 'Sample license_number 5',
                'establishment_date' => '2017-10-08',
                'license_expiry_date' => '2019-10-08',
                'email' => 'Sample email 5',
                'national_address' => 'Sample national_address 5',
                'authorized_person' => 'Sample authorized_person 5',
                'authorized_email' => 'Sample authorized_email 5',
                'authorized_mobile' => 'Sample authorized_mobile 5',
                'landline' => 'Sample landline 5',
                'website' => 'Sample website 5',
                'partnership_percentage' => 734,
                'partnership_type' => 'Sample partnership_type 5',
                'note' => 'Sample note 5',
            ],
        ];

        foreach ($owner_associations as $data) {
            OwnerAssociation::firstOrCreate($data);
        }
    }
}
