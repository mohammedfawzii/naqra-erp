<?php

namespace Modules\Payroll\Database\Seeders\PayrollAttachment;

use Illuminate\Database\Seeder;
use Modules\Payroll\Models\PayrollAttachment;

class PayrollAttachmentSeeder extends Seeder
{
    public function run(): void
    {
        $attachments = [
            ['file' => 'Sample file 1', 'reference_number' => '123456'],
            ['file' => 'Sample file 2', 'reference_number' => '123456'],
            ['file' => 'Sample file 3', 'reference_number' => '123456'],
            ['file' => 'Sample file 4', 'reference_number' => '123456'],
            ['file' => 'Sample file 5', 'reference_number' => '123456'],
        ];

        foreach ($attachments as $attachment) {
            PayrollAttachment::firstOrCreate($attachment);
        }
    }
}
