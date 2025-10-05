<?php

namespace Modules\AttendanceTracking\Models;

use Faker\Provider\Base;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\AttendanceTracking\Database\Factories\AiAttendanceInsightFactory;

class AiAttendanceInsight extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): AiAttendanceInsightFactory
    // {
    //     // return AiAttendanceInsightFactory::new();
    // }
}
