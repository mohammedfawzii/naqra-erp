<?php

namespace Modules\Employee\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class columnEmployee extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
             public $translatable = ['key', 'label'];

    // protected static function newFactory(): ColumnEmployeeFactory
    // {
    //     // return ColumnEmployeeFactory::new();
    // }
}
