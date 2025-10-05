<?php

namespace Modules\Payroll\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Payroll\Database\Factories\ColumnsPayrollFactory;

class ColumnsPayroll extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
     public $translatable = ['key', 'label'];


    // protected static function newFactory(): ColumnsPayrollFactory
    // {
    //     // return ColumnsPayrollFactory::new();
    // }
}
