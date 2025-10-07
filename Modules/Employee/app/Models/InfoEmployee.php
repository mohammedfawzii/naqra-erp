<?php

namespace Modules\Employee\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class InfoEmployee extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    public $translatable = ['title', 'desc'];

    // protected static function newFactory(): InfoEmployeeFactory
    // {
    //     // return InfoEmployeeFactory::new();
    // }
}
