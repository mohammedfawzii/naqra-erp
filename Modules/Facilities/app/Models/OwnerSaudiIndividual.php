<?php

namespace Modules\Facilities\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\CmsErp\Models\Nationality;

// use Modules\Facilities\Database\Factories\OwnerSaudiIndividualFactory;

class OwnerSaudiIndividual extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): OwnerSaudiIndividualFactory
    // {
    //     // return OwnerSaudiIndividualFactory::new();
    // }

    public function owner()
    {
        return $this->belongsTo(Owner::class, 'owner_id');
    }


    public function national()
    {
        return $this->belongsTo(Nationality::class, 'national_id');
    }

}