<?php

namespace Modules\Performance\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Performance\Database\Factories\ColumnPerformanceFactory;

class ColumnPerformance extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
         public $translatable = ['key', 'label'];


    // protected static function newFactory(): ColumnPerformanceFactory
    // {
    //     // return ColumnPerformanceFactory::new();
    // }
}
