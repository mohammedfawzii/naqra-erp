<?php

namespace Modules\Training\Models;

 use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Training\Database\Factories\LicensingAndCertificationManagementFactory;

class LicensingAndCertificationManagement extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): LicensingAndCertificationManagementFactory
    // {
    //     // return LicensingAndCertificationManagementFactory::new();
    // }
}
