<?php

namespace Modules\Benefit\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Benefit\Database\Factories\VariableCompensationManagementFactory;

class VariableCompensationManagement extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): VariableCompensationManagementFactory
    // {
    //     // return VariableCompensationManagementFactory::new();
    // }
}
