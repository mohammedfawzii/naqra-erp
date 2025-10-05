<?php

namespace Modules\CmsErp\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Employee\Models\Employeeinfo;
use Spatie\Translatable\HasTranslations;

// use Modules\CmsErp\Database\Factories\QualificationFactory;

class Qualification extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    public $translatable = ['name'];

    // protected static function newFactory(): QualificationFactory
    // {
    //     // return QualificationFactory::new();
    // }


}