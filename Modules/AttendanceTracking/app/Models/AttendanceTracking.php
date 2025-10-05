<?php

namespace Modules\AttendanceTracking\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\AttendanceTracking\Database\Factories\AttendanceTrackingFactory;

class AttendanceTracking extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): AttendanceTrackingFactory
    // {
    //     // return AttendanceTrackingFactory::new();
    // }
}
