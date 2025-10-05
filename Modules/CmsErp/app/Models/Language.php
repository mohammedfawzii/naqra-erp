<?php

namespace Modules\CmsErp\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CmsErp\Database\Factories\LanguageFactory;
use Spatie\Translatable\HasTranslations;

class Language extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    public $translatable = ['name'];


    // protected static function newFactory(): LanguageFactory
    // {
    //     // return LanguageFactory::new();
    // }
}
