<?php

namespace Modules\Benefit\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Benefit\Database\Factories\RetirementPlanManagementFactory;

class RetirementPlanManagement extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): RetirementPlanManagementFactory
    // {
    //     // return RetirementPlanManagementFactory::new();
    // }
}
