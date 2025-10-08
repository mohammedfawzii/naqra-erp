<?php

namespace Modules\Employee\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Employee\Database\Factories\EmployeeFinancialEntitlementFactory;

class EmployeeFinancialEntitlement extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): EmployeeFinancialEntitlementFactory
    // {
    //     // return EmployeeFinancialEntitlementFactory::new();
    // }

    public function salaryType()
    {
        return $this->belongsTo(SalaryType::class, 'salary_type_id');
    }


    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }


    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id');
    }

}