<?php

namespace Modules\Facilities\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Facilities\Database\Factories\PeriodicObligationsFactory;

class PeriodicObligations extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): PeriodicObligationsFactory
    // {
    //     // return PeriodicObligationsFactory::new();
    // }


    public function facilityAttachments()
    {
        return $this->belongsTo(FacilityAttachments::class, 'facility_attachments_id','reference_number');
    }


    // public function facility()
    // {
    //     return $this->belongsTo(facility::class, 'facility_id');
    // }

}