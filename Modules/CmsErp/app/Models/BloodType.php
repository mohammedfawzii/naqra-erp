<?php

namespace Modules\CmsErp\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CmsErp\Database\Factories\BloodTypeFactory;
use Spatie\Translatable\HasTranslations;

class BloodType extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    public $translatable = ['blood_type'];

    // protected static function newFactory(): BloodTypeFactory
    // {
    //     // return BloodTypeFactory::new();
    // }
}
