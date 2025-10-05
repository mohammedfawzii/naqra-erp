<?php

namespace Modules\Facilities\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Facilities\Database\Factories\InfoFacilitiesFactory;
use Spatie\Translatable\HasTranslations;

class InfoFacilities extends Model
{
    use HasFactory, HasTranslations;
    protected $table = 'info_facilities';
    public $translatable = ['title', 'desc'];

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];
}
