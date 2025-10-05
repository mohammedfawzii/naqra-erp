<?php

namespace Modules\ExitManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\ExitManagement\Database\Factories\ContextualExitManagementFactory;

class ContextualExitManagement extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): ContextualExitManagementFactory
    // {
    //     // return ContextualExitManagementFactory::new();
    // }
}
