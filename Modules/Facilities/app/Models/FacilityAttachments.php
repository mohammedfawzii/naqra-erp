<?php

namespace Modules\Facilities\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Facilities\Database\Factories\FacilityFileFactory;

class FacilityAttachments extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];


       protected static function booted()
    {
        static::creating(function ($model) {
    $model->reference_number = (int) (now()->format('ymd') . mt_rand(100, 999));
        });
    }

}
