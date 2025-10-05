<?php

namespace Modules\Facilities\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\CmsErp\Models\Subscription;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\CmsErp\Models\SubscriptionType;

// use Modules\Facilities\Database\Factories\SubscriptionFacilitiesFactory;

class SubscriptionFacilities extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): SubscriptionFacilitiesFactory
    // {
    //     // return SubscriptionFacilitiesFactory::new();
    // }


    public function subscription()
    {
        return $this->belongsTo(Subscription::class, 'subscription_id');
    }



    public function subscriptionTypes()
    {
        return $this->belongsTo(SubscriptionType::class, 'subscription_types_id');
    }



    public function facilityAttachments()
    {
        return $this->belongsTo(FacilityAttachments::class, 'facility_attachments_id','reference_number');
    }

}
