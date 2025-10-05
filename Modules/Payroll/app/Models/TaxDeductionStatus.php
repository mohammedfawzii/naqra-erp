<?php

namespace Modules\Payroll\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Payroll\Database\Factories\TaxDeductionStatusFactory;

class TaxDeductionStatus extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
        public $translatable = ['status'];


    // protected static function newFactory(): TaxDeductionStatusFactory
    // {
    //     // return TaxDeductionStatusFactory::new();
    // }
}
