<?php

namespace Modules\ExitManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\ExitManagement\Database\Factories\AutomatedExitCommunicationManagementFactory;

class AutomatedExitCommunicationManagement extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): AutomatedExitCommunicationManagementFactory
    // {
    //     // return AutomatedExitCommunicationManagementFactory::new();
    // }
}
