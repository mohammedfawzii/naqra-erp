<?php

namespace Modules\Facilities\Models;

use Modules\CmsErp\Models\BranchType;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Facilities\Database\Factories\BranchesFactory;

class branches extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
        public $translatable = ['name'];

    


   

}
