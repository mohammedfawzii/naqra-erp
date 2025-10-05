<?php

namespace Modules\Performance\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Performance\Database\Factories\InfoPerformanceFactory;

class InfoPerformance extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];
            public $translatable = ['title', 'desc'];


    // protected static function newFactory(): InfoPerformanceFactory
    // {
    //     // return InfoPerformanceFactory::new();
    // }
}
