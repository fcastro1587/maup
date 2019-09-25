<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
  protected $conn = 'db3';

  public function multimedia1()
  {
  return $this->hasMany(Multimedia::class, 'id', 'img1');
  }

  public function multimedia2()
  {
  return $this->hasMany(Multimedia::class, 'id', 'img2');
  }

}
