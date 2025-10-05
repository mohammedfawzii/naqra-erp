<?php

namespace Modules\CmsErp\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CmsErp\Database\Factories\ActivitySpecificFactory;
use Spatie\Translatable\HasTranslations;

class ActivitySpecific extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    public $translatable = ['ownership_type'];

    public function activityPrivate()
    {
        return $this->belongsToMany(ActivityPrivate::class);
    }

    // protected static function newFactory(): ActivitySpecificFactory
    // {
    //     // return ActivitySpecificFactory::new();
    // }
}
