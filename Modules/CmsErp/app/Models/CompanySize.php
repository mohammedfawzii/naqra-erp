<?php

namespace Modules\CmsErp\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CmsErp\Database\Factories\CompanySizeFactory;

class CompanySize extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];
    public $translatable = ['type'];

    // protected static function newFactory(): CompanySizeFactory
    // {
    //     // return CompanySizeFactory::new();
    // }
}
