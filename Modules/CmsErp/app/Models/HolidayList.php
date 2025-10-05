<?php

namespace Modules\CmsErp\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CmsErp\Database\Factories\HolidayListFactory;
use Spatie\Translatable\HasTranslations;

class HolidayList extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    public $translatable = ['holiday_name'];

    // protected static function newFactory(): HolidayListFactory
    // {
    //     // return HolidayListFactory::new();
    // }
}
