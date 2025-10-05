<?php

namespace Modules\CmsErp\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CmsErp\Database\Factories\ActivityPrivateFactory;
use Spatie\Translatable\HasTranslations;

class ActivityPrivate extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

        public $translatable = ['name'];

        public function activityGeneral()
        {
            return $this->belongsTo(ActivityGeneral::class);
        }
        public function activitySpecific()
        {
            return $this->belongsToMany(ActivitySpecific::class);
        }

    // protected static function newFactory(): ActivityPrivateFactory
    // {
    //     // return ActivityPrivateFactory::new();
    // }
}
