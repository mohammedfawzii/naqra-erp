<?php

namespace Modules\Facilities\Database\Seeders\Branches;

use Illuminate\Database\Seeder;
use Modules\Facilities\Models\Branches;

class BranchesSeeder extends Seeder
{
    public function run(): void
    {
        Branches::firstOrCreate([
                'name' => 'Sample name 1',
                'registration_number' => 'Sample registration_number 1',
                'address' => 'Sample address 1',
                'branch_types_id' => '1',
                'registration_start_date' => '1993-09-20',
                'registration_end_date' => '1992-09-20',
                'facility_attachments_id' => '1',
        ]);

        Branches::firstOrCreate([
                'name' => 'Sample name 2',
                'registration_number' => 'Sample registration_number 2',
                'address' => 'Sample address 2',
                'branch_types_id' => '2',
                'registration_start_date' => '2006-09-20',
                'registration_end_date' => '1975-09-20',
                'facility_attachments_id' => '2',
        ]);

        Branches::firstOrCreate([
                'name' => 'Sample name 3',
                'registration_number' => 'Sample registration_number 3',
                'address' => 'Sample address 3',
                'branch_types_id' => '3',
                'registration_start_date' => '2010-09-20',
                'registration_end_date' => '1997-09-20',
                'facility_attachments_id' => '3',
        ]);

        Branches::firstOrCreate([
                'name' => 'Sample name 4',
                'registration_number' => 'Sample registration_number 4',
                'address' => 'Sample address 4',
                'branch_types_id' => '4',
                'registration_start_date' => '1996-09-20',
                'registration_end_date' => '1975-09-20',
                'facility_attachments_id' => '4',
        ]);

        Branches::firstOrCreate([
                'name' => 'Sample name 5',
                'registration_number' => 'Sample registration_number 5',
                'address' => 'Sample address 5',
                'branch_types_id' => '5',
                'registration_start_date' => '1982-09-20',
                'registration_end_date' => '2002-09-20',
                'facility_attachments_id' => '5',
        ]);

    }
}
