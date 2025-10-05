<?php

namespace Modules\Performance\Models;

use Modules\CmsErp\Models\Position;
 use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Performance\Database\Factories\SuccessionPlanningFactory;

class SuccessionPlanning extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): SuccessionPlanningFactory
    // {
    //     // return SuccessionPlanningFactory::new();
    // }


    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }

}
