<?php

namespace Modules\Facilities\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InfoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('info_Facilities')->insert([
            [
            'infoable_type' => 'Facilities',
            'title' => '{"en":"Facilities","ar":"مرافق"}',
            'desc' => '{"en":"Description for Facilities","ar":"وصف للمرافق"}',
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ]);
            DB::table('info_Facilities')->insert([
            [
            'infoable_type' => 'User',
            'title' => '{"en":"User","ar":"مستخدم"}',
            'desc' => '{"en":"Description for User","ar":"وصف للمستخدم"}',
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ]);
            DB::table('info_Facilities')->insert([
            [
            'infoable_type' => 'Owner',
            'title' => '{"en":"Owner","ar":"مالك"}',
            'desc' => '{"en":"Description for Owner","ar":"وصف للمالك"}',
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ]);


            DB::table('info_Facilities')->insert([
            [
            'infoable_type' => 'FacilityDigital',
            'title' => '{"en":"Facilitydigital","ar":"FacilityDigital"}',
            'desc' => '{"en":"Description for Facilitydigital","ar":"الوصف للمرفق"}',
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ]);
            DB::table('info_Facilities')->insert([
            [
            'infoable_type' => 'DigitalFacility',
            'title' => '{"en":"Digitalfacility","ar":"DigitalFacility"}',
            'desc' => '{"en":"Description for Digitalfacility","ar":"وصف لـ DigitalFacility"}',
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ]);
            DB::table('info_Facilities')->insert([
            [
            'infoable_type' => 'Branches',
            'title' => '{"en":"Branches","ar":"الفروع"}',
            'desc' => '{"en":"Description for Branches","ar":"وصف الفروع"}',
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ]);
            DB::table('info_Facilities')->insert([
            [
            'infoable_type' => 'License',
            'title' => '{"en":"License","ar":"رخصة"}',
            'desc' => '{"en":"Description for License","ar":"وصف للترخيص"}',
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ]);
            DB::table('info_Facilities')->insert([
            [
            'infoable_type' => 'SubscriptionFacilities',
            'title' => '{"en":"Subscriptionfacilities","ar":"مرافق الاشتراك"}',
            'desc' => '{"en":"Description for Subscriptionfacilities","ar":"وصف لمرافق الاشتراك"}',
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ]);
            DB::table('info_Facilities')->insert([
            [
            'infoable_type' => 'periodicObligations',
            'title' => '{"en":"Periodicobligations","ar":"الالتزامات الدورية"}',
            'desc' => '{"en":"Description for Periodicobligations","ar":"وصف للالتزامات الدورية"}',
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ]);
            DB::table('info_Facilities')->insert([
            [
            'infoable_type' => 'MedicalInsuranceCategories',
            'title' => '{"en":"Medicalinsurancecategories","ar":"فئات التأمين الطبي"}',
            'desc' => '{"en":"Description for Medicalinsurancecategories","ar":"وصف لفئات التأمين الطبي"}',
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ]);
            DB::table('info_Facilities')->insert([
            [
            'infoable_type' => 'MedicalInsuranceFacilities',
            'title' => '{"en":"Medicalinsurancefacilities","ar":"مرافق التأمين الطبي"}',
            'desc' => '{"en":"Description for Medicalinsurancefacilities","ar":"وصف مرافق التأمين الطبي"}',
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ]);
            DB::table('info_Facilities')->insert([
            [
            'infoable_type' => 'MedicalInsurancesFacilities',
            'title' => '{"en":"Medicalinsurancesfacilities","ar":"مرافق التأمين الطبي"}',
            'desc' => '{"en":"Description for Medicalinsurancesfacilities","ar":"وصف مرافق التأمين الطبي"}',
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ]);
    }
}