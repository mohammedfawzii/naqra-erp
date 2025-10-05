<?php

namespace Modules\Facilities\Database\Seeders\SubscriptionFacilities;

use Illuminate\Database\Seeder;
use Modules\Facilities\Models\SubscriptionFacilities;

class SubscriptionFacilitiesSeeder extends Seeder
{
    public function run(): void
    {
        SubscriptionFacilities::firstOrCreate([
                'subscription_id' => '1',
                'subscription_types_id' => '7',
                'invoice_number' => 'Sample invoice_number 1',
                'invoice_value' => 'Sample invoice_value 1',
                'start_date' => '1975-09-20',
                'end_date' => '2009-09-20',
                'reminder_date' => '1996-09-20',
                'notes' => 'Sample notes 1',
                'facility_attachments_id' => '1',
        ]);

        SubscriptionFacilities::firstOrCreate([
                'subscription_id' => '2',
                'subscription_types_id' => '2',
                'invoice_number' => 'Sample invoice_number 2',
                'invoice_value' => 'Sample invoice_value 2',
                'start_date' => '1985-09-20',
                'end_date' => '2003-09-20',
                'reminder_date' => '2003-09-20',
                'notes' => 'Sample notes 2',
                'facility_attachments_id' => '2',
        ]);

        SubscriptionFacilities::firstOrCreate([
                'subscription_id' => '3',
                'subscription_types_id' => '4',
                'invoice_number' => 'Sample invoice_number 3',
                'invoice_value' => 'Sample invoice_value 3',
                'start_date' => '1999-09-20',
                'end_date' => '1975-09-20',
                'reminder_date' => '2000-09-20',
                'notes' => 'Sample notes 3',
                'facility_attachments_id' => '3',
        ]);

        SubscriptionFacilities::firstOrCreate([
                'subscription_id' => '4',
                'subscription_types_id' => '2',
                'invoice_number' => 'Sample invoice_number 4',
                'invoice_value' => 'Sample invoice_value 4',
                'start_date' => '2006-09-20',
                'end_date' => '1979-09-20',
                'reminder_date' => '1978-09-20',
                'notes' => 'Sample notes 4',
                'facility_attachments_id' => '4',
        ]);

        SubscriptionFacilities::firstOrCreate([
                'subscription_id' => '5',
                'subscription_types_id' => '8',
                'invoice_number' => 'Sample invoice_number 5',
                'invoice_value' => 'Sample invoice_value 5',
                'start_date' => '1977-09-20',
                'end_date' => '1984-09-20',
                'reminder_date' => '1996-09-20',
                'notes' => 'Sample notes 5',
                'facility_attachments_id' => '5',
        ]);

    }
}
