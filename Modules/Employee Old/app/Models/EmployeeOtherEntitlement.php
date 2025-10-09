<?php

namespace Modules\Employee\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Employee\Database\Factories\EmployeeOtherEntitlementFactory;

class EmployeeOtherEntitlement extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): EmployeeOtherEntitlementFactory
    // {
    //     // return EmployeeOtherEntitlementFactory::new();
    // }
}
