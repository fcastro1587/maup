<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
  protected $conn = 'db3';

  public function travels()
  {
    return $this->belongsToMany(Travel::class, 'country_travel', 'country_code_iata','travel_mt', 'code_iata', 'mt');
  }

  public function visas()
  {
    return $this->hasMany(Visa::class, 'country_code', 'code_iata');
  }

  public function cities()
  {
  return $this->hasMany(Travel::class, 'country_code_iata', 'code_iata');
  }




}
