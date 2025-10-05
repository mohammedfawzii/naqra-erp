<?php

namespace Modules\CmsErp\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CmsErp\Database\Factories\CompanyActivityFactory;
use Spatie\Translatable\HasTranslations;

class CompanyActivity extends Model
{
    use HasFactory,HasTranslations;
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    public $translatable = ['activity_name'];

    // protected static function newFactory(): CompanyActivityFactory
    // {
    //     // return CompanyActivityFactory::new();
    // }
}
