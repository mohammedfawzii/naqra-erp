<?php

namespace Modules\Facilities\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Facilities\Database\Factories\OwnerSaudiIndividualFactory;

class OwnerSaudiIndividual extends Model
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
}
