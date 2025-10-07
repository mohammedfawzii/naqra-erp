<?php

namespace Modules\Facilities\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Facilities\Database\Factories\OwnerSaudiCompanyFactory;

class OwnerSaudiCompany extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): OwnerSaudiCompanyFactory
    // {
    //     // return OwnerSaudiCompanyFactory::new();
    // }
}
