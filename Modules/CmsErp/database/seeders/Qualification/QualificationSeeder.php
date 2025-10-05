<?php

namespace Modules\CmsErp\Database\Seeders\Qualification;

use Illuminate\Database\Seeder;
use Modules\CmsErp\Models\Qualification;

class QualificationSeeder extends Seeder
{
    public function run(): void
    {
        $qualifications = [
            [
                'name' => [
                    'en' => 'Sample name 1',
                    'ar' => 'عينة name 1'
                ],
            ],
            [
                'name' => [
                    'en' => 'Sample name 2',
                    'ar' => 'عينة name 2'
                ],
            ],
            [
                'name' => [
                    'en' => 'Sample name 3',
                    'ar' => 'عينة name 3'
                ],
            ],
            [
                'name' => [
                    'en' => 'Sample name 4',
                    'ar' => 'عينة name 4'
                ],
            ],
            [
                'name' => [
                    'en' => 'Sample name 5',
                    'ar' => 'عينة name 5'
                ],
            ],
        ];

        foreach ($qualifications as $data) {
            Qualification::firstOrCreate($data);
        }
    }
}
