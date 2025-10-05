<?php

namespace Modules\CmsErp\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CmsErp\Database\Factories\JopTitleFactory;

class JopTitle extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    public $table='jop_titles';
    public $translatable = ['title'];


    // protected static function newFactory(): JopTitleFactory
    // {
    //     // return JopTitleFactory::new();
    // }
}
