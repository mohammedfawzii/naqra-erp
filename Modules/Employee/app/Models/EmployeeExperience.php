<?php

namespace Modules\Employee\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Employee\Database\Factories\EmployeeExperienceFactory;

class EmployeeExperience extends BaseModel
{
  

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    
    public $translatable = ['job_title'];

    // protected static function newFactory(): EmployeeExperienceFactory
    // {
    //     // return EmployeeExperienceFactory::new();
    // }
}
