<?php

namespace Modules\CmsErp\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CmsErp\Database\Factories\HolidaysListFactory;
use Spatie\Translatable\HasTranslations;

class HolidaysList extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    public $translatable = ['holiday_type'];

    // protected static function newFactory(): HolidaysListFactory
    // {
    //     // return HolidaysListFactory::new();
    // }
}
