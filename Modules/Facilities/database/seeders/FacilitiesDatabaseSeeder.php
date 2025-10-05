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
        $this->call(MedicalInsurancesFacilities\MedicalInsurancesFacilitiesSeeder::class);
        $this->call(periodicObligations\periodicObligationsSeeder::class);
        $this->call(SubscriptionFacilities\SubscriptionFacilitiesSeeder::class);
        $this->call(License\LicenseSeeder::class);
        $this->call(Branches\BranchesSeeder::class);
        $this->call(DigitalFacility\DigitalFacilitySeeder::class);
          $this->call(Owner\OwnerSeeder::class);
        $this->call(Facilities\FacilitiesSeeder::class);
        $this->call(User\UserSeeder::class);
        $this->call([
            ColumnsSeeder::class,
            InfoSeeder::class,
        ]);
    }
}
