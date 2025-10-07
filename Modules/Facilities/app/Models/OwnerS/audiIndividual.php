<?php

namespace Modules\Facilities\Models\OwnerS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Facilities\Database\Factories\OwnerS\audiIndividualFactory;

class audiIndividual extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): OwnerS\audiIndividualFactory
    // {
    //     // return OwnerS\audiIndividualFactory::new();
    // }
}
