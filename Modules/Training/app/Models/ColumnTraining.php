<?php

namespace Modules\Training\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Training\Database\Factories\ColumnTrainingFactory;

class ColumnTraining extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
             public $translatable = ['key', 'label'];


    // protected static function newFactory(): ColumnTrainingFactory
    // {
    //     // return ColumnTrainingFactory::new();
    // }
}
