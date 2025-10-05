<?php

namespace Modules\Facilities\Models;

use Modules\CmsErp\Models\BranchType;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Facilities\Database\Factories\BranchesFactory;

class branches extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];


    // protected static function newFactory(): BranchesFactory
    // {
    //     // return BranchesFactory::new();
    // }


    public function branchTypes()
    {
        return $this->belongsTo(BranchType::class, 'branch_types_id');
    }



    public function facilityAttachments()
    {
        return $this->belongsTo(FacilityAttachments::class, 'facility_attachments_id','reference_number');
    }

}
