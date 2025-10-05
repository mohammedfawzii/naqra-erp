<?php

namespace Modules\Payroll\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Payroll\Database\Factories\InfoPayrollFactory;

class InfoPayroll extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
        public $translatable = ['title', 'desc'];


    // protected static function newFactory(): InfoPayrollFactory
    // {
    //     // return InfoPayrollFactory::new();
    // }
}
