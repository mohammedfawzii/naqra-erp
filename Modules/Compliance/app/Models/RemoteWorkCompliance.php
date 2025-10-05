<?php

namespace Modules\Compliance\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Compliance\Database\Factories\RemoteWorkComplianceFactory;

class RemoteWorkCompliance extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): RemoteWorkComplianceFactory
    // {
    //     // return RemoteWorkComplianceFactory::new();
    // }
}
