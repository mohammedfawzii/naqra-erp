<?php

namespace Modules\CmsErp\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CmsErp\Database\Factories\MinistryFactory;
use Spatie\Translatable\HasTranslations;

class Ministry extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    public $translatable = ['ministry_name'];

    // protected static function newFactory(): MinistryFactory
    // {
    //     // return MinistryFactory::new();
    // }
}
