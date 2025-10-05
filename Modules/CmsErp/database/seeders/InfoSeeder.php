<?php

namespace Modules\CmsErp\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InfoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('info_CmsErp')->insert([
            [
            'infoable_type' => 'LicenseType',
            'title' => '{"en":"Licensetype","ar":"نوع الترخيص"}',
            'desc' => '{"en":"Description for Licensetype","ar":"الوصف لـ Licensetype"}',
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ]);
            DB::table('info_CmsErp')->insert([
            [
            'infoable_type' => 'SubscriptionType',
            'title' => '{"en":"Subscriptiontype","ar":"الاشتراك"}',
            'desc' => '{"en":"Description for Subscriptiontype","ar":"وصف للاشتراك"}',
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ]);
            DB::table('info_CmsErp')->insert([
            [
            'infoable_type' => 'PaymentMethod',
            'title' => '{"en":"Paymentmethod","ar":"PaymentMethod"}',
            'desc' => '{"en":"Description for Paymentmethod","ar":"وصف للدفع"}',
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ]);
    }
}