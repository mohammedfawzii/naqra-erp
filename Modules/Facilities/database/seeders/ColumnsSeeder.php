<?php

namespace Modules\Facilities\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColumnsSeeder extends Seeder
{
    public function run(): void
    {
        $now = now()->toDateTimeString();

        $columns = [
        'Facilities' => [
            ['name', 'اسم', 'Name', 'اسم'],
            ['have_branches', 'have_branches', 'Have Branches', 'لها فروع'],
            ['employee_count', 'الموظف', 'Employee Count', 'عدد الموظفين'],
            ['national_number_alone', 'الرقم_الوطني_وحده', 'National Number Alone', 'الرقم الوطني وحده'],
            ['status', 'حالة', 'Status', 'حالة'],
            ['activity', 'نشاط', 'Activity', 'نشاط'],
            ['completion_percentage', 'نسبة الإنجاز', 'Completion Percentage', 'نسبة الانتهاء']
        ],
];
         foreach ($columns as $model => $fields) {
            foreach ($fields as $field) {
                DB::table('columns_facilities')->insert([
                    'model' => $model,
                    'key' => json_encode(['en' => $field[0], 'ar' => $field[1]], JSON_UNESCAPED_UNICODE),
                    'label' => json_encode(['en' => $field[2], 'ar' => $field[3]], JSON_UNESCAPED_UNICODE),
                    'sortable' => true,
                    'filterable' => true,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
        }
    }
}