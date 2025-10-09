<?php

namespace Modules\Facilities\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Facilities\Database\Seeders\Branch\BranchSeeder;
use Modules\Facilities\Database\Seeders\ColumnsSeeder;
use Modules\Facilities\Database\Seeders\DigitalFacility\DigitalFacilitySeeder;
use Modules\Facilities\Database\Seeders\Facilities\FacilitiesSeeder;
use Modules\Facilities\Database\Seeders\InfoSeeder;
use Modules\Facilities\Database\Seeders\MedicalInsurancesFacilities\MedicalInsurancesFacilitiesSeeder;
use Modules\Facilities\Database\Seeders\Owner\OwnerSeeder;
use Modules\Facilities\Database\Seeders\OwnerAssociation\OwnerAssociationSeeder;
use Modules\Facilities\Database\Seeders\OwnerEndowment\OwnerEndowmentSeeder;
use Modules\Facilities\Database\Seeders\OwnerForeignCompany\OwnerForeignCompanySeeder;
use Modules\Facilities\Database\Seeders\OwnerGulf\OwnerGulfSeeder;
use Modules\Facilities\Database\Seeders\OwnerGulfCompany\OwnerGulfCompanySeeder;
use Modules\Facilities\Database\Seeders\OwnerResident\OwnerResidentSeeder;
use Modules\Facilities\Database\Seeders\OwnerSaudiIndividual\OwnerSaudiIndividualSeeder;
use Modules\Facilities\Database\Seeders\PeriodicObligations\PeriodicObligationsSeeder;
use Modules\Facilities\Database\Seeders\SubscriptionFacilities\SubscriptionFacilitiesSeeder;

class FacilitiesDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      
      

        $this->call([
            ColumnsSeeder::class,
            InfoSeeder::class,
            FacilitiesSeeder::class,
            BranchSeeder::class,
            DigitalFacilitySeeder::class,
            OwnerSeeder::class,
            OwnerAssociationSeeder::class,
            OwnerSaudiIndividualSeeder::class,
            OwnerGulfSeeder::class,
            OwnerResidentSeeder::class,
            OwnerGulfCompanySeeder::class,
            OwnerEndowmentSeeder::class,
            OwnerForeignCompanySeeder::class,
            SubscriptionFacilitiesSeeder::class,
            PeriodicObligationsSeeder::class,
            MedicalInsurancesFacilitiesSeeder::class
            
         ]);
 
       
 
 
    }
}
