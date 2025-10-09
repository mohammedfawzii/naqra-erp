<?php

namespace Modules\Facilities\Database\Seeders\OwnerResident;

use Illuminate\Database\Seeder;
use Modules\Facilities\Models\OwnerResident;

class OwnerResidentSeeder extends Seeder
{
    public function run(): void
    {
        $owner_residents = [
            [
                'owner_id' => 3,
                'full_name' => 'Sample full_name 1',
                'resident_id' => 3,
                'email' => 'Sample email 1',
                'mobile' => 'Sample mobile 1',
                'national_address' => 'Sample national_address 1',
                'investment_license_number' => 'Sample investment_license_number 1',
                'birth_date' => '2012-10-08',
                'partnership_type' => 'Sample partnership_type 1',
                'partnership_percentage' => 709,
                'note' => 'Sample note 1',
            ],
            [
                'owner_id' => 3,
                'full_name' => 'Sample full_name 2',
                'resident_id' => 1,
                'email' => 'Sample email 2',
                'mobile' => 'Sample mobile 2',
                'national_address' => 'Sample national_address 2',
                'investment_license_number' => 'Sample investment_license_number 2',
                'birth_date' => '2022-10-08',
                'partnership_type' => 'Sample partnership_type 2',
                'partnership_percentage' => 76,
                'note' => 'Sample note 2',
            ],
            [
                'owner_id' => 3,
                'full_name' => 'Sample full_name 3',
                'resident_id' => 1,
                'email' => 'Sample email 3',
                'mobile' => 'Sample mobile 3',
                'national_address' => 'Sample national_address 3',
                'investment_license_number' => 'Sample investment_license_number 3',
                'birth_date' => '2016-10-08',
                'partnership_type' => 'Sample partnership_type 3',
                'partnership_percentage' => 495,
                'note' => 'Sample note 3',
            ],
            [
                'owner_id' => 1,
                'full_name' => 'Sample full_name 4',
                'resident_id' => 3,
                'email' => 'Sample email 4',
                'mobile' => 'Sample mobile 4',
                'national_address' => 'Sample national_address 4',
                'investment_license_number' => 'Sample investment_license_number 4',
                'birth_date' => '2005-10-08',
                'partnership_type' => 'Sample partnership_type 4',
                'partnership_percentage' => 283,
                'note' => 'Sample note 4',
            ],
            [
                'owner_id' => 3,
                'full_name' => 'Sample full_name 5',
                'resident_id' => 1,
                'email' => 'Sample email 5',
                'mobile' => 'Sample mobile 5',
                'national_address' => 'Sample national_address 5',
                'investment_license_number' => 'Sample investment_license_number 5',
                'birth_date' => '2024-10-08',
                'partnership_type' => 'Sample partnership_type 5',
                'partnership_percentage' => 444,
                'note' => 'Sample note 5',
            ],
        ];

        foreach ($owner_residents as $data) {
            OwnerResident::firstOrCreate($data);
        }
    }
}
