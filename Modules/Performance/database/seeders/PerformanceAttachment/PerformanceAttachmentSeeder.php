<?php

namespace Modules\PerformanceAttachment\Database\Seeders\PayrollAttachment;

use Illuminate\Database\Seeder;
use Modules\Payroll\Models\PayrollAttachment;
use Modules\Performance\Models\PerformanceAttachment;

class PerformanceAttachmentSeeder extends Seeder
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
            PerformanceAttachment::firstOrCreate($attachment);
        }
    }
}
