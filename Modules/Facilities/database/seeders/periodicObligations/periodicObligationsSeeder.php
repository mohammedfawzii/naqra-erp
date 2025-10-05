<?php

namespace Modules\Facilities\Database\Seeders\periodicObligations;

use Illuminate\Database\Seeder;
use Modules\Facilities\Models\periodicObligations;

class periodicObligationsSeeder extends Seeder
{
    public function run(): void
    {
        periodicObligations::firstOrCreate([
                'zakat_due_date' => '1995-09-20',
                'zakat_reminder_date' => '1987-09-20',
                'tax_declaration_due_date' => '2003-09-20',
                'tax_declaration_reminder_date' => '2005-09-20',
                'salary_due_date' => '1983-09-20',
                'salary_reminder_date' => '1996-09-20',
                'facility_attachments_id' => '1',
        ]);

        periodicObligations::firstOrCreate([
                'zakat_due_date' => '1985-09-20',
                'zakat_reminder_date' => '1978-09-20',
                'tax_declaration_due_date' => '2008-09-20',
                'tax_declaration_reminder_date' => '1975-09-20',
                'salary_due_date' => '1992-09-20',
                'salary_reminder_date' => '1986-09-20',
                'facility_attachments_id' => '1',
        ]);

        periodicObligations::firstOrCreate([
                'zakat_due_date' => '1986-09-20',
                'zakat_reminder_date' => '1979-09-20',
                'tax_declaration_due_date' => '1975-09-20',
                'tax_declaration_reminder_date' => '1975-09-20',
                'salary_due_date' => '1997-09-20',
                'salary_reminder_date' => '1981-09-20',
                'facility_attachments_id' => '1',
        ]);

        periodicObligations::firstOrCreate([
                'zakat_due_date' => '1980-09-20',
                'zakat_reminder_date' => '1999-09-20',
                'tax_declaration_due_date' => '2003-09-20',
                'tax_declaration_reminder_date' => '1987-09-20',
                'salary_due_date' => '1980-09-20',
                'salary_reminder_date' => '1975-09-20',
                'facility_attachments_id' => '1',
        ]);

        periodicObligations::firstOrCreate([
                'zakat_due_date' => '1984-09-20',
                'zakat_reminder_date' => '1987-09-20',
                'tax_declaration_due_date' => '2005-09-20',
                'tax_declaration_reminder_date' => '1995-09-20',
                'salary_due_date' => '1998-09-20',
                'salary_reminder_date' => '2004-09-20',
                'facility_attachments_id' => '1',
        ]);

    }
}
