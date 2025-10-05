<?php

namespace Modules\Compliance\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Compliance\Database\Factories\LegalRiskFactory;

class LegalRisk extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): LegalRiskFactory
    // {
    //     // return LegalRiskFactory::new();
    // }
}
