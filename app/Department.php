<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
  protected $conn = 'db3';

  protected $fillable = [
    'code',
    'name',
    'initial_range',
    'final_range',
    'img_department',
  ];

  public function travels()
  {
  return $this->hasMany(Travel::class, 'department', 'code');
  }

  public function headers()
  {
  return $this->hasMany(Header::class, 'header_department', 'code');
  }

  public function carousels()
  {
  return $this->hasMany(CarouselTravel::class, 'carousel_travel_code', 'code');
  }

  public function banners()
  {
  return $this->hasMany(Banner::class, 'banner_department', 'code');
  }

}
