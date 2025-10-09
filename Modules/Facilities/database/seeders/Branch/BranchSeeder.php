<?php

namespace Modules\Facilities\Database\Seeders\Branch;

use Illuminate\Database\Seeder;
use Modules\Facilities\Models\Branch;

class BranchSeeder extends Seeder
{
    public function run(): void
    {
        $branches = [
            [
                'facility_id' => 2,
                'avatar' => 'Sample avatar 1',
                'unified_national_number' => '123456789A',
                'name' => [
                    'en' => 'Sample name 1',
                    'ar' => 'عينة name 1'
                ],
                'entity_id' => 3,
                'company_type_id' => 2,
                'company_size_id' => 3,
                'city_id' => 3,
                'headquarter_id' => 3,
                'activity_id' => 3,
                'phone_number' => 'Sample phone_number 1',
                'email' => 'Sample email 1',
                'website' => 'Sample website 1',
            ],
            [
                'facility_id' => 1,
                'avatar' => 'Sample avatar 2',
                'unified_national_number' => '123456789A',
                'name' => [
                    'en' => 'Sample name 2',
                    'ar' => 'عينة name 2'
                ],
                'entity_id' => 3,
                'company_type_id' => 1,
                'company_size_id' => 3,
                'city_id' => 1,
                'headquarter_id' => 2,
                'activity_id' => 3,
                'phone_number' => 'Sample phone_number 2',
                'email' => 'Sample email 2',
                'website' => 'Sample website 2',
            ],
            [
                'facility_id' => 1,
                'avatar' => 'Sample avatar 3',
                'unified_national_number' => '123456789A',
                'name' => [
                    'en' => 'Sample name 3',
                    'ar' => 'عينة name 3'
                ],
                'entity_id' => 3,
                'company_type_id' => 1,
                'company_size_id' => 2,
                'city_id' => 3,
                'headquarter_id' => 2,
                'activity_id' => 2,
                'phone_number' => 'Sample phone_number 3',
                'email' => 'Sample email 3',
                'website' => 'Sample website 3',
            ],
            [
                'facility_id' => 3,
                'avatar' => 'Sample avatar 4',
                'unified_national_number' => '123456789A',
                'name' => [
                    'en' => 'Sample name 4',
                    'ar' => 'عينة name 4'
                ],
                'entity_id' => 1,
                'company_type_id' => 2,
                'company_size_id' => 2,
                'city_id' => 3,
                'headquarter_id' => 2,
                'activity_id' => 3,
                'phone_number' => 'Sample phone_number 4',
                'email' => 'Sample email 4',
                'website' => 'Sample website 4',
            ],
            [
                'facility_id' => 3,
                'avatar' => 'Sample avatar 5',
                'unified_national_number' => '123456789A',
                'name' => [
                    'en' => 'Sample name 5',
                    'ar' => 'عينة name 5'
                ],
                'entity_id' => 1,
                'company_type_id' => 3,
                'company_size_id' => 1,
                'city_id' => 1,
                'headquarter_id' => 2,
                'activity_id' => 2,
                'phone_number' => 'Sample phone_number 5',
                'email' => 'Sample email 5',
                'website' => 'Sample website 5',
            ],
        ];

        foreach ($branches as $data) {
            Branch::firstOrCreate($data);
        }
    }
}
