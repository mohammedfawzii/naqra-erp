<?php

namespace Modules\Facilities\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Facilities\Database\Factories\OwnerAssociationFactory;

class OwnerAssociation extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): OwnerAssociationFactory
    // {
    //     // return OwnerAssociationFactory::new();
    // }

    public function owner()
    {
        return $this->belongsTo(Owner::class, 'owner_id');
    }

}