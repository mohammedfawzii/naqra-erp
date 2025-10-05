<?php

namespace Modules\Performance\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Employee\Models\Employeeinfo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Performance\Database\Factories\BaseModelFactory;

class BaseModel extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];


       public function employee()
    {
        return $this->belongsTo(Employeeinfo::class, 'employeeinfo_id');
    }
     public function attachments()
    {
        return $this->morphMany(PerformanceAttachment::class, 'attachable');
    }
}
