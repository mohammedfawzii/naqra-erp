<?php

namespace Modules\Facilities\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Facilities\Database\Factories\OwnerEndowmentFactory;

class OwnerEndowment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): OwnerEndowmentFactory
    // {
    //     // return OwnerEndowmentFactory::new();
    // }

    public function owner()
    {
        return $this->belongsTo(Owner::class, 'owner_id');
    }

}