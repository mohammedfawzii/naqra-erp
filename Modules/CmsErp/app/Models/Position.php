<?php

namespace Modules\CmsErp\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CmsErp\Database\Factories\PositionFactory;
use Spatie\Translatable\HasTranslations;

class Position extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    public $translatable = ['position_name'];

    // protected static function newFactory(): PositionFactory
    // {
    //     // return PositionFactory::new();
    // }
}
