<?php

namespace Modules\Facilities\Models;

use Modules\CmsErp\Models\Ministry;
use Modules\CmsErp\Models\LicenseType;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// use Modules\Facilities\Database\Factories\LicenseFactory;

class License extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    // public $translatable = ['title', 'desc'];


    // protected static function newFactory(): LicenseFactory
    // {
    //     // return LicenseFactory::new();
    // }


    public function ministry()
    {
        return $this->belongsTo(Ministry::class, 'ministry_name_id');
    }



    public function licenseType()
    {
        return $this->belongsTo(LicenseType::class, 'license_type_id');
    }



    public function branch()
    {
        return $this->belongsTo(branches::class, 'branch_id');
    }

}
