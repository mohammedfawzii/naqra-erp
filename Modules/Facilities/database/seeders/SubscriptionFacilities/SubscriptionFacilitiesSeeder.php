<?php

namespace Modules\Facilities\Database\Seeders\SubscriptionFacilities;

use Illuminate\Database\Seeder;
use Modules\Facilities\Models\SubscriptionFacilities;

class SubscriptionFacilitiesSeeder extends Seeder
{
    public function run(): void
    {
        $subscription_facilities = [
            [
                'branch_id' => 1,
                'subscription_id' => 1,
                'subscription_types_id' => 1,
                'invoice_number' => 'Sample invoice_number 1',
                'invoice_value' => 'Sample invoice_value 1',
                'start_date' => '2005-10-08',
                'end_date' => '2022-10-08',
                'reminder_date' => '2020-10-08',
                'notes' => 'Sample notes 1',
            ],
            [
                'branch_id' => 1,
                'subscription_id' => 2,
                'subscription_types_id' => 1,
                'invoice_number' => 'Sample invoice_number 2',
                'invoice_value' => 'Sample invoice_value 2',
                'start_date' => '2005-10-08',
                'end_date' => '2010-10-08',
                'reminder_date' => '2023-10-08',
                'notes' => 'Sample notes 2',
            ],
            [
                'branch_id' => 1,
                'subscription_id' => 2,
                'subscription_types_id' => 1,
                'invoice_number' => 'Sample invoice_number 3',
                'invoice_value' => 'Sample invoice_value 3',
                'start_date' => '2012-10-08',
                'end_date' => '2012-10-08',
                'reminder_date' => '2017-10-08',
                'notes' => 'Sample notes 3',
            ],
            [
                'branch_id' => 1,
                'subscription_id' => 3,
                'subscription_types_id' => 2,
                'invoice_number' => 'Sample invoice_number 4',
                'invoice_value' => 'Sample invoice_value 4',
                'start_date' => '2013-10-08',
                'end_date' => '2011-10-08',
                'reminder_date' => '2020-10-08',
                'notes' => 'Sample notes 4',
            ],
            [
                'branch_id' => 1,
                'subscription_id' => 3,
                'subscription_types_id' => 3,
                'invoice_number' => 'Sample invoice_number 5',
                'invoice_value' => 'Sample invoice_value 5',
                'start_date' => '2015-10-08',
                'end_date' => '2012-10-08',
                'reminder_date' => '2012-10-08',
                'notes' => 'Sample notes 5',
            ],
        ];

        foreach ($subscription_facilities as $data) {
            SubscriptionFacilities::firstOrCreate($data);
        }
    }
}
