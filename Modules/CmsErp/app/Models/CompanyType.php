<?php

namespace Modules\CmsErp\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CmsErp\Database\Factories\CompanyTypeFactory;
use Spatie\Translatable\HasTranslations;

class CompanyType extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    public $translatable = ['company_type'];

    // protected static function newFactory(): CompanyTypeFactory
    // {
    //     // return CompanyTypeFactory::new();
    // }
}
