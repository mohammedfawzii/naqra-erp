<?php

namespace Modules\Performance\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Performance\Database\Factories\DevelopmentPlanFactory;

class DevelopmentPlan extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): DevelopmentPlanFactory
    // {
    //     // return DevelopmentPlanFactory::new();
    // }
}
