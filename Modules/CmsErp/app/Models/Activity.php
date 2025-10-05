<?php

namespace Modules\CmsErp\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CmsErp\Database\Factories\ActivityFactory;

class Activity extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
        public $translatable = ['activity'];


    // protected static function newFactory(): ActivityFactory
    // {
    //     // return ActivityFactory::new();
    // }
}
