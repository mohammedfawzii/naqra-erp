<?php

namespace Modules\Training\Models;

use Modules\Training\Models\BaseModel;

  use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Training\Database\Factories\CertificationManagementFactory;

class CertificationManagement extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): CertificationManagementFactory
    // {
    //     // return CertificationManagementFactory::new();
    // }
}
