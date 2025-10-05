<?php

namespace Modules\CmsErp\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CmsErp\Database\Factories\MedicalInsuranceCategorieFactory;
use Spatie\Translatable\HasTranslations;

class MedicalInsuranceCategorie extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    public $translatable = ['blood_type'];

    // protected static function newFactory(): MedicalInsuranceCategorieFactory
    // {
    //     // return MedicalInsuranceCategorieFactory::new();
    // }
}
