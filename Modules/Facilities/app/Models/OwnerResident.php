<?php

namespace Modules\Facilities\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Facilities\Database\Factories\OwnerResidentFactory;

class OwnerResident extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): OwnerResidentFactory
    // {
    //     // return OwnerResidentFactory::new();
    // }

    public function owner()
    {
        return $this->belongsTo(Owner::class, 'owner_id');
    }


    // public function resident()
    // {
    //     return $this->belongsTo(Resident::class, 'resident_id');
    // }

}