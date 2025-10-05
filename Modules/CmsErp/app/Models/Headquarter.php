<?php

namespace Modules\CmsErp\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CmsErp\Database\Factories\HeadquarterFactory;
use Spatie\Translatable\HasTranslations;

class Headquarter extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    public $translatable = ['headquarters'];

    // protected static function newFactory(): HeadquarterFactory
    // {
    //     // return HeadquarterFactory::new();
    // }
}
