<?php

namespace Modules\CmsErp\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CmsErp\Database\Factories\NationalityFactory;
use Spatie\Translatable\HasTranslations;

class Nationality extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    public $translatable = ['name'];

    // protected static function newFactory(): NationalityFactory
    // {
    //     // return NationalityFactory::new();
    // }
}
