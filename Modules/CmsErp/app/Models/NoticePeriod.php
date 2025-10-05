<?php

namespace Modules\CmsErp\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CmsErp\Database\Factories\NoticePeriodFactory;
use Spatie\Translatable\HasTranslations;

class NoticePeriod extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    public $translatable = ['period_name'];

    // protected static function newFactory(): NoticePeriodFactory
    // {
    //     // return NoticePeriodFactory::new();
    // }
}
