<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $conn = 'db3';
    
    public function travels()
    {
      return $this->hasOne('App\Travel');
    }
}
