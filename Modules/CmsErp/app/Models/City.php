<?php

namespace Modules\CmsErp\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CmsErp\Database\Factories\CityFactory;
use Spatie\Translatable\HasTranslations;

class City extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    public $translatable = ['name'];
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    // protected static function newFactory(): CityFactory
    // {
    //     // return CityFactory::new();
    // }
}
