<?php

namespace Modules\CmsErp\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColumnsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('columns_facilities')->insert(
            [
            ['model' => 'PaymentMethod', 'key' => json_encode(array (
  'en' => 'name',
  'ar' => 'اسم',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Name',
  'ar' => 'اسم',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 12:52:28', 'updated_at' => '2025-09-21 12:52:28']
        ]
        );
    }
}