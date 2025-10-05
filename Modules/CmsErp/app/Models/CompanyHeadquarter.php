<?php

namespace Modules\CmsErp\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CmsErp\Database\Factories\CompanyHeadquarterFactory;
use Spatie\Translatable\HasTranslations;

class CompanyHeadquarter extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    public $translatable = ['headquarter_name'];

    // protected static function newFactory(): CompanyHeadquarterFactory
    // {
    //     // return CompanyHeadquarterFactory::new();
    // }
}
