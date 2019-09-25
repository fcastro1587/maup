<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
  protected $conn = 'db3';

  public function travels()
  {
    return $this->belongsToMany(Travel::class, 'section_travels', 'travel_mt', 'section_id', 'mt', 'id');
  }
}
