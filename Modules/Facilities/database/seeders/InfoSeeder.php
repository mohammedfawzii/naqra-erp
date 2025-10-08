<?php

namespace Modules\Facilities\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Facilities\Models\InfoFacilities;

class InfoSeeder extends Seeder
{
    public function run(): void
    {
        $records=[
                [
                'infoable_type' => 'facilities',
                'title' => ['en' => 'facilities', 'ar' => 'حساب الموظف'],
                'desc'  => ['en' => 'Description for facilities', 'ar' => 'وصف لحساب الموظف'],
            ], 
        ];
        


        foreach ($records as $record) {
            InfoFacilities::firstOrCreate(
                ['infoable_type' => $record['infoable_type']],
                [
                    'title' => $record['title'],
                    'desc'  => $record['desc'],
                ]
            );
        }
    }
}