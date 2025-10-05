<?php

namespace Modules\Performance\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Performance\Database\Factories\EmployeeRecognitionManagementFactory;

class EmployeeRecognitionManagement extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): EmployeeRecognitionManagementFactory
    // {
    //     // return EmployeeRecognitionManagementFactory::new();
    // }
}
