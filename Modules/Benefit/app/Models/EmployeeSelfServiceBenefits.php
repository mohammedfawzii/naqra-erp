<?php

namespace Modules\Benefit\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Benefit\Database\Factories\EmployeeSelfServiceBenefitsFactory;

class EmployeeSelfServiceBenefits extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): EmployeeSelfServiceBenefitsFactory
    // {
    //     // return EmployeeSelfServiceBenefitsFactory::new();
    // }
}
