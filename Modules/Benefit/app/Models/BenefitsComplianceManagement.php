<?php

namespace Modules\Benefit\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Benefit\Database\Factories\BenefitsComplianceManagementFactory;

class BenefitsComplianceManagement extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): BenefitsComplianceManagementFactory
    // {
    //     // return BenefitsComplianceManagementFactory::new();
    // }
}
