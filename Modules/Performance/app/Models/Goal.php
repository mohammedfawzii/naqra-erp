<?php

namespace Modules\Performance\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Employee\Models\Employeeinfo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Performance\Database\Factories\GoalFactory;

class Goal extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];



}
