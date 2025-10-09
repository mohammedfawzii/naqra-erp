<?php

namespace Modules\Facilities\Database\Seeders\Owner;

use Illuminate\Database\Seeder;
use Modules\Facilities\Models\Owner;

class OwnerSeeder extends Seeder
{
    public function run(): void
    {
        $owners = [
            [
                'facility_id' => 3,
                'owner_type' => 'association',
            ],
            [
                'facility_id' => 3,
                'owner_type' => 'association',
            ],
            [
                'facility_id' => 2,
                'owner_type' => 'association',
            ],
            [
                'facility_id' => 1,
                'owner_type' => 'association',
            ],
            [
                'facility_id' => 3,
                'owner_type' => 'association',
            ],
        ];

        foreach ($owners as $data) {
            Owner::firstOrCreate($data);
        }
    }
}
