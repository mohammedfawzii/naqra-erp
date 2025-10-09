<?php

namespace Modules\Facilities\Database\Seeders\OwnerSaudiIndividual;

use Illuminate\Database\Seeder;
use Modules\Facilities\Models\OwnerSaudiIndividual;

class OwnerSaudiIndividualSeeder extends Seeder
{
    public function run(): void
    {
        $owner_saudi_individuals = [
            [
                'owner_id' => 3,
                'name' => 'Sample name 1',
                'national_id' => 2,
                'email' => 'Sample email 1',
                'mobile' => 'Sample mobile 1',
                'national_address' => 'Sample national_address 1',
                'birth_date' => '2024-10-08',
                'occupation' => 'Sample occupation 1',
                'partnership_percentage' => 439,
                'partnership_type' => 'Sample partnership_type 1',
                'note' => 'Sample note 1',
            ],
            [
                'owner_id' => 3,
                'name' => 'Sample name 2',
                'national_id' => 3,
                'email' => 'Sample email 2',
                'mobile' => 'Sample mobile 2',
                'national_address' => 'Sample national_address 2',
                'birth_date' => '2023-10-08',
                'occupation' => 'Sample occupation 2',
                'partnership_percentage' => 415,
                'partnership_type' => 'Sample partnership_type 2',
                'note' => 'Sample note 2',
            ],
            [
                'owner_id' => 1,
                'name' => 'Sample name 3',
                'national_id' => 2,
                'email' => 'Sample email 3',
                'mobile' => 'Sample mobile 3',
                'national_address' => 'Sample national_address 3',
                'birth_date' => '2011-10-08',
                'occupation' => 'Sample occupation 3',
                'partnership_percentage' => 699,
                'partnership_type' => 'Sample partnership_type 3',
                'note' => 'Sample note 3',
            ],
            [
                'owner_id' => 2,
                'name' => 'Sample name 4',
                'national_id' => 1,
                'email' => 'Sample email 4',
                'mobile' => 'Sample mobile 4',
                'national_address' => 'Sample national_address 4',
                'birth_date' => '2005-10-08',
                'occupation' => 'Sample occupation 4',
                'partnership_percentage' => 352,
                'partnership_type' => 'Sample partnership_type 4',
                'note' => 'Sample note 4',
            ],
            [
                'owner_id' => 3,
                'name' => 'Sample name 5',
                'national_id' => 2,
                'email' => 'Sample email 5',
                'mobile' => 'Sample mobile 5',
                'national_address' => 'Sample national_address 5',
                'birth_date' => '2007-10-08',
                'occupation' => 'Sample occupation 5',
                'partnership_percentage' => 341,
                'partnership_type' => 'Sample partnership_type 5',
                'note' => 'Sample note 5',
            ],
        ];

        foreach ($owner_saudi_individuals as $data) {
            OwnerSaudiIndividual::firstOrCreate($data);
        }
    }
}
