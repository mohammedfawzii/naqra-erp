<?php

namespace Modules\CmsErp\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CmsErp\Database\Factories\BankFactory;

class Bank extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    public $translatable = ['name'];

    // protected static function newFactory(): BankFactory
    // {
    //     // return BankFactory::new();
    // }
}
