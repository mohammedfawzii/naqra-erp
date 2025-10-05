<?php

namespace Modules\Payroll\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Payroll\Database\Factories\TaxDeductionTypeFactory;

class TaxDeductionType extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
        public $translatable = ['type'];


    // protected static function newFactory(): TaxDeductionTypeFactory
    // {
    //     // return TaxDeductionTypeFactory::new();
    // }
}
