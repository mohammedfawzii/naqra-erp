<?php

namespace Modules\CmsErp\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CmsErp\Database\Factories\TrialPeriodFactory;
use Spatie\Translatable\HasTranslations;

class TrialPeriod extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    public $translatable = ['period_long'];

    // protected static function newFactory(): TrialPeriodFactory
    // {
    //     // return TrialPeriodFactory::new();
    // }
}
