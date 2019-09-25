<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    protected $conn = 'db3';
    
    protected $fillable = [
      'name',
      'city',
      'slug',
      'department',
      'multimedia_id_1',
    ];

    public function travels()
    {
      return $this->belongsToMany(Travel::class, 'filter_travel', 'travel_mt', 'filter_id', 'mt', 'id');
    }

    public function cities()
    {
      return $this->belongsToMany(City::class, 'city_travel', 'travel_mt', 'city_id', 'mt', 'id');
    }

    public function multi()
    {
    return $this->hasMany(Multimedia::class, 'id', 'multimedia_id_1');
    }
}
