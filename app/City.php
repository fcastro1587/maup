<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $conn = 'db3';
    
  protected $fillable = [
    'country_code_iata',
    'name',
    'longitude',
    'latitude',
  ];

  public function countries()
  { 
    return $this->hasMany(Country::class, 'code_iata', 'country_code_iata');
  }

  /*public function travels()
  {
    return $this->belongsToMany(Travel::class, 'city_travel', 'travel_mt', 'city_id', 'mt', 'id');
  }*/

  public function travels()
  {
    return $this->belongsToMany(Travel::class, 'city_travel', 'city_id', 'travel_mt', 'id', 'mt');
  }

  /*public function travels()
  {
    return $this->belongsToMany(Travel::class, 'city_travel', 'id','city_id', 'travel_mt',  'mt')
            ->orderBy('id', 'ASC');
  }*/

  public function scopeSearch($query, $name)
  {
    if (trim($name) != "") {
      $query->where(\DB::raw("CONCAT(name)"), "LIKE", "%$name%");
    }
  }
}
