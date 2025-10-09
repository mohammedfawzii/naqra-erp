<?php

namespace Modules\Facilities\Database\Seeders\PeriodicObligations;

use Illuminate\Database\Seeder;
use Modules\Facilities\Models\PeriodicObligations;

class PeriodicObligationsSeeder extends Seeder
{
    public function run(): void
    {
        $periodic_obligations = [
            [
                'facility_id' => 1,
                'zakat_due_date' => '2015-10-08',
                'zakat_reminder_date' => '2017-10-08',
                'tax_declaration_due_date' => '2018-10-08',
                'tax_declaration_reminder_date' => '2023-10-08',
                'salary_due_date' => '2007-10-08',
                'salary_reminder_date' => '2020-10-08',
            ],
            [
                'facility_id' => 1,
                'zakat_due_date' => '2021-10-08',
                'zakat_reminder_date' => '2013-10-08',
                'tax_declaration_due_date' => '2015-10-08',
                'tax_declaration_reminder_date' => '2006-10-08',
                'salary_due_date' => '2013-10-08',
                'salary_reminder_date' => '2014-10-08',
            ],
            [
                'facility_id' => 3,
                'zakat_due_date' => '2022-10-08',
                'zakat_reminder_date' => '2006-10-08',
                'tax_declaration_due_date' => '2012-10-08',
                'tax_declaration_reminder_date' => '2018-10-08',
                'salary_due_date' => '2008-10-08',
                'salary_reminder_date' => '2022-10-08',
            ],
            [
                'facility_id' => 1,
                'zakat_due_date' => '2024-10-08',
                'zakat_reminder_date' => '2013-10-08',
                'tax_declaration_due_date' => '2010-10-08',
                'tax_declaration_reminder_date' => '2022-10-08',
                'salary_due_date' => '2015-10-08',
                'salary_reminder_date' => '2018-10-08',
            ],
            [
                'facility_id' => 1,
                'zakat_due_date' => '2011-10-08',
                'zakat_reminder_date' => '2016-10-08',
                'tax_declaration_due_date' => '2021-10-08',
                'tax_declaration_reminder_date' => '2006-10-08',
                'salary_due_date' => '2013-10-08',
                'salary_reminder_date' => '2016-10-08',
            ],
        ];

        foreach ($periodic_obligations as $data) {
            PeriodicObligations::firstOrCreate($data);
        }
    }
}
