<?php

namespace Modules\Training\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Training\Database\Factories\InfoTrainingFactory;

class InfoTraining extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
            public $translatable = ['title', 'desc'];

    // protected static function newFactory(): InfoTrainingFactory
    // {
    //     // return InfoTrainingFactory::new();
    // }
}
