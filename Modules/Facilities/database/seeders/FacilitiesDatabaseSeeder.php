<?php

namespace Modules\Facilities\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Facilities\Database\Seeders\ColumnsSeeder;
use Modules\Facilities\Database\Seeders\InfoSeeder;

class FacilitiesDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(Facilities\FacilitiesSeeder::class);

        $this->call([
            ColumnsSeeder::class,
            InfoSeeder::class,
        ]);
    }
}
