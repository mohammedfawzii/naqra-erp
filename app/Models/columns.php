<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class columns extends Model
{


  public function columnable()
  {
    return $this->morphTo();
  }
}
