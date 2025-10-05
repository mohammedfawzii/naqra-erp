<?php

namespace Modules\CmsErp\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CmsErp\Database\Factories\SalaryTypeFactory;
use Spatie\Translatable\HasTranslations;

class SalaryType extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    public $translatable = ['salary_type'];

    // protected static function newFactory(): SalaryTypeFactory
    // {
    //     // return SalaryTypeFactory::new();
    // }
}
