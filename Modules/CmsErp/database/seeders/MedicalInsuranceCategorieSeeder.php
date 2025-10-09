<?php

namespace Modules\CmsErp\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\CmsErp\Models\MedicalInsuranceCategorie;

class MedicalInsuranceCategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'category_name' => [
                    'en' => 'Basic Insurance',
                    'ar' => 'التأمين الأساسي',
                ],
            ],
            [
                'category_name' => [
                    'en' => 'Premium Insurance',
                    'ar' => 'التأمين المميز',
                ],
            ],
            [
                'category_name' => [
                    'en' => 'Executive Insurance',
                    'ar' => 'التأمين التنفيذي',
                ],
            ],
        ];

        foreach ($categories as $data) {
            MedicalInsuranceCategorie::firstOrCreate(
                ['category_name->en' => $data['category_name']['en']],
                $data
            );
        }
    }
}
