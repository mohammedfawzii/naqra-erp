<?php

namespace Modules\CmsErp\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CmsErp\Database\Factories\MedicalInsuranceFactory;
use Spatie\Translatable\HasTranslations;

class MedicalInsurance extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    public $translatable = ['insurance_name'];

    // protected static function newFactory(): MedicalInsuranceFactory
    // {
    //     // return MedicalInsuranceFactory::new();
    // }
}
