<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    protected $conn = 'db3';
    
    public function travels()
    {
      return $this->belongsToMany('App\Travel', 'airline_travel', 'travel_mt', 'airline_code_iata', 'mt', 'code_iata');
    }
}
