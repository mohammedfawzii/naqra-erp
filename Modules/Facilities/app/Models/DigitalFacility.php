<?php

namespace Modules\Facilities\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Facilities\Database\Factories\DigitalFacilityFactory;

class DigitalFacility extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    // protected static function newFactory(): DigitalFacilityFactory
    // {
    //     // return DigitalFacilityFactory::new();
    // }


    public function facilityAttachments()
    {
        return $this->belongsTo(FacilityAttachments::class, 'facility_attachments_id');
    }


    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

}