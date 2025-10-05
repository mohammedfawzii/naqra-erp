<?php

namespace Modules\CmsErp\Database\Seeders\PaymentMethod;

use Illuminate\Database\Seeder;
use Modules\CmsErp\Models\PaymentMethod;

class PaymentMethodSeeder extends Seeder
{
    public function run(): void
    {
        PaymentMethod::firstOrCreate([
                'name' => [
                    'en' => 'Sample name 1',
                    'ar' => 'عينة name 1'
                ],
        ]);

        PaymentMethod::firstOrCreate([
                'name' => [
                    'en' => 'Sample name 2',
                    'ar' => 'عينة name 2'
                ],
        ]);

        PaymentMethod::firstOrCreate([
                'name' => [
                    'en' => 'Sample name 3',
                    'ar' => 'عينة name 3'
                ],
        ]);

        PaymentMethod::firstOrCreate([
                'name' => [
                    'en' => 'Sample name 4',
                    'ar' => 'عينة name 4'
                ],
        ]);

        PaymentMethod::firstOrCreate([
                'name' => [
                    'en' => 'Sample name 5',
                    'ar' => 'عينة name 5'
                ],
        ]);

    }
}
