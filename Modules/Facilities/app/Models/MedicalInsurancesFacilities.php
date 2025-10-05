<?php

namespace Modules\Facilities\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\CmsErp\Models\MedicalInsuranceCategorie;

// use Modules\Facilities\Database\Factories\MedicalInsurancesFacilitiesFactory;

class MedicalInsurancesFacilities extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): MedicalInsurancesFacilitiesFactory
    // {
    //     // return MedicalInsurancesFacilitiesFactory::new();
    // }


    public function medicalInsuranceCategories()
    {
        return $this->belongsTo(MedicalInsuranceCategorie::class, 'medical_insurance_categories_id');
    }

}
