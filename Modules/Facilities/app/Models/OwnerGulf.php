<?php

namespace Modules\Facilities\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\CmsErp\Models\Nationality;

// use Modules\Facilities\Database\Factories\OwnerGulfFactory;

class OwnerGulf extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    public $translatable = ['first_name','second_name','third_name','family_name'];

 
    // protected static function newFactory(): OwnerGulfFactory
    // {
    //     // return OwnerGulfFactory::new();
    // }

    public function owner()
    {
        return $this->belongsTo(Owner::class, 'owner_id');
    }


    public function nationality()
    {
        return $this->belongsTo(Nationality::class, 'nationality_id');
    }


    public function gulfNational()
    {
        // return $this->belongsTo(gulfNational::class, 'gulf_national_id');
    }

}