<?php

namespace Modules\ExitManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\ExitManagement\Database\Factories\ExitSurveyManagementFactory;

class ExitSurveyManagement extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): ExitSurveyManagementFactory
    // {
    //     // return ExitSurveyManagementFactory::new();
    // }
}
