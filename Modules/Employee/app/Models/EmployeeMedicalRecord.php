<?php

namespace Modules\Employee\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\CmsErp\Models\MedicalInsuranceCategorie;

// use Modules\Employee\Database\Factories\EmployeeMedicalRecordFactory;

class EmployeeMedicalRecord extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): EmployeeMedicalRecordFactory
    // {
    //     // return EmployeeMedicalRecordFactory::new();
    // }

    public function medicalInsuranceCategory()
    {
        return $this->belongsTo(MedicalInsuranceCategorie::class, 'medical_insurance_category_id');
    }

}