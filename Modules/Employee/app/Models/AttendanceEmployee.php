<?php

namespace Modules\Employee\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Employee\Database\Factories\AttendanceFactory;

class AttendanceEmployee extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): AttendanceFactory
    // {
    //     // return AttendanceFactory::new();
    // }
}
