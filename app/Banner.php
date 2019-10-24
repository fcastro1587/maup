<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
  protected $conn = 'db3';

  protected $fillable = [
    'img1',          
    'img2' ,         
    'banner_department', 
    'travel_mt',      
    'days',         
    'price_from',   
    'departure',     
    'alt',         
    'url',             
    'status', 
  ];

  public function multimedia1()
  {
  return $this->belongsTo(Multimedia::class, 'img1', 'id');
  }

  public function multimedia2()
  {
  return $this->belongsTo(Multimedia::class, 'img2', 'id');
  }

}
