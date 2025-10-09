<?php

namespace Modules\Facilities\Database\Seeders\OwnerEndowment;

use Illuminate\Database\Seeder;
use Modules\Facilities\Models\OwnerEndowment;

class OwnerEndowmentSeeder extends Seeder
{
    public function run(): void
    {
        $owner_endowments = [
            [
                'owner_id' => 2,
                'endowment_name' => 'Sample endowment_name 1',
                'endowment_national_number' => 'Sample endowment_national_number 1',
                'approval_date' => '2010-10-08',
                'authorized_person' => 'Sample authorized_person 1',
                'authorized_mobile' => 'Sample authorized_mobile 1',
                'authorized_email' => 'Sample authorized_email 1',
                'address' => 'Sample address 1',
                'partnership_type' => 'Sample partnership_type 1',
                'partnership_percentage' => 619,
                'note' => 'Sample note 1',
            ],
            [
                'owner_id' => 2,
                'endowment_name' => 'Sample endowment_name 2',
                'endowment_national_number' => 'Sample endowment_national_number 2',
                'approval_date' => '2022-10-08',
                'authorized_person' => 'Sample authorized_person 2',
                'authorized_mobile' => 'Sample authorized_mobile 2',
                'authorized_email' => 'Sample authorized_email 2',
                'address' => 'Sample address 2',
                'partnership_type' => 'Sample partnership_type 2',
                'partnership_percentage' => 318,
                'note' => 'Sample note 2',
            ],
            [
                'owner_id' => 3,
                'endowment_name' => 'Sample endowment_name 3',
                'endowment_national_number' => 'Sample endowment_national_number 3',
                'approval_date' => '2011-10-08',
                'authorized_person' => 'Sample authorized_person 3',
                'authorized_mobile' => 'Sample authorized_mobile 3',
                'authorized_email' => 'Sample authorized_email 3',
                'address' => 'Sample address 3',
                'partnership_type' => 'Sample partnership_type 3',
                'partnership_percentage' => 348,
                'note' => 'Sample note 3',
            ],
            [
                'owner_id' => 2,
                'endowment_name' => 'Sample endowment_name 4',
                'endowment_national_number' => 'Sample endowment_national_number 4',
                'approval_date' => '2018-10-08',
                'authorized_person' => 'Sample authorized_person 4',
                'authorized_mobile' => 'Sample authorized_mobile 4',
                'authorized_email' => 'Sample authorized_email 4',
                'address' => 'Sample address 4',
                'partnership_type' => 'Sample partnership_type 4',
                'partnership_percentage' => 512,
                'note' => 'Sample note 4',
            ],
            [
                'owner_id' => 2,
                'endowment_name' => 'Sample endowment_name 5',
                'endowment_national_number' => 'Sample endowment_national_number 5',
                'approval_date' => '2021-10-08',
                'authorized_person' => 'Sample authorized_person 5',
                'authorized_mobile' => 'Sample authorized_mobile 5',
                'authorized_email' => 'Sample authorized_email 5',
                'address' => 'Sample address 5',
                'partnership_type' => 'Sample partnership_type 5',
                'partnership_percentage' => 475,
                'note' => 'Sample note 5',
            ],
        ];

        foreach ($owner_endowments as $data) {
            OwnerEndowment::firstOrCreate($data);
        }
    }
}
