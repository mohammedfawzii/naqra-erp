<?php

namespace Modules\Facilities\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Facilities\Database\Factories\OwnerGulfCompanyFactory;

class OwnerGulfCompany extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
        public $translatable = ['name'];


    // protected static function newFactory(): OwnerGulfCompanyFactory
    // {
    //     // return OwnerGulfCompanyFactory::new();
    // }

    public function owner()
    {
        return $this->belongsTo(Owner::class, 'owner_id');
    }

}