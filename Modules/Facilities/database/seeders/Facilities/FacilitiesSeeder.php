<?php

namespace Modules\Facilities\Database\Seeders\Facilities;

use Illuminate\Database\Seeder;
use Modules\Facilities\Models\Facilities;

class FacilitiesSeeder extends Seeder
{
    public function run(): void
    {
        $facilities = [
            [
                'name' => '{}',
                'have_branches' => 1,
                'employee_count' => 6,
                'national_number_alone' => '1',
                'status' => 'active',
                'activity' => 'Sample activity 1',
                'completion_percentage' => 1,
            ],
            [
                'name' => '{}',
                'have_branches' => 1,
                'employee_count' => 6,
                'national_number_alone' => '2',
                'status' => 'active',
                'activity' => 'Sample activity 2',
                'completion_percentage' => 9,
            ],
            [
                'name' => '{}',
                'have_branches' => 1,
                'employee_count' => 6,
                'national_number_alone' => '3',
                'status' => 'active',
                'activity' => 'Sample activity 3',
                'completion_percentage' => 4,
            ],
            [
                'name' => '{}',
                'have_branches' => 1,
                'employee_count' => 9,
                'national_number_alone' => '4',
                'status' => 'active',
                'activity' => 'Sample activity 4',
                'completion_percentage' => 4,
            ],
            [
                'name' => '{}',
                'have_branches' => 1,
                'employee_count' => 7,
                'national_number_alone' => '5',
                'status' => 'active',
                'activity' => 'Sample activity 5',
                'completion_percentage' => 4,
            ],
        ];

        foreach ($facilities as $data) {
            Facilities::firstOrCreate($data);
        }
    }
}
