<?php

namespace Modules\Employee\Database\Seeders\EmployeeAddress;

use Illuminate\Database\Seeder;
use Modules\Employee\Models\EmployeeAddress;

class EmployeeAddressSeeder extends Seeder
{
    public function run(): void
    {
        $employee_addresses = [
            [
                'employee_id' => 1,
                'type' => 'current',
                'country_id' => 1,
                'city_id' => 1,
                'neighborhood' => 'Sample neighborhood 1',
                'street' => 'Sample street 1',
                'building_number' => 'Sample building_number 1',
                'building_type' => 'Sample building_type 1',
                'building_name' => 'Sample building_name 1',
                'postal_code' => 'Sample postal_code 1',
                'po_box' => 'Sample po_box 1',
                'notes' => 'Sample notes 1',
                'same_address' => 1,
            ],
            [
                'employee_id' => 1,
                'type' => 'current',
                'country_id' => 1,
                'city_id' => 1,
                'neighborhood' => 'Sample neighborhood 2',
                'street' => 'Sample street 2',
                'building_number' => 'Sample building_number 2',
                'building_type' => 'Sample building_type 2',
                'building_name' => 'Sample building_name 2',
                'postal_code' => 'Sample postal_code 2',
                'po_box' => 'Sample po_box 2',
                'notes' => 'Sample notes 2',
                'same_address' => 1,
            ],
            [
                'employee_id' => 1,
                'type' => 'current',
                'country_id' => 1,
                'city_id' => 1,
                'neighborhood' => 'Sample neighborhood 3',
                'street' => 'Sample street 3',
                'building_number' => 'Sample building_number 3',
                'building_type' => 'Sample building_type 3',
                'building_name' => 'Sample building_name 3',
                'postal_code' => 'Sample postal_code 3',
                'po_box' => 'Sample po_box 3',
                'notes' => 'Sample notes 3',
                'same_address' => 1,
            ],
            [
                'employee_id' => 1,
                'type' => 'current',
                'country_id' => 1,
                'city_id' => 1,
                'neighborhood' => 'Sample neighborhood 4',
                'street' => 'Sample street 4',
                'building_number' => 'Sample building_number 4',
                'building_type' => 'Sample building_type 4',
                'building_name' => 'Sample building_name 4',
                'postal_code' => 'Sample postal_code 4',
                'po_box' => 'Sample po_box 4',
                'notes' => 'Sample notes 4',
                'same_address' => 1,
            ],
            [
                'employee_id' => 2,
                'type' => 'current',
                'country_id' => 1,
                'city_id' => 1,
                'neighborhood' => 'Sample neighborhood 5',
                'street' => 'Sample street 5',
                'building_number' => 'Sample building_number 5',
                'building_type' => 'Sample building_type 5',
                'building_name' => 'Sample building_name 5',
                'postal_code' => 'Sample postal_code 5',
                'po_box' => 'Sample po_box 5',
                'notes' => 'Sample notes 5',
                'same_address' => 1,
            ],
        ];

        foreach ($employee_addresses as $data) {
            EmployeeAddress::firstOrCreate($data);
        }
    }
}
