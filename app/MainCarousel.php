<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainCarousel extends Model
{
  protected $conn = 'db3';

    protected $fillable = [
      'travel_mt',
      'bloqueo_mt',
      'multimedia_id_1',
      'multimedia_id_2',
      'multimedia_id_3',
      'video',
      'order_item',
      'active_item',
    ];

    public function img1()
    {
      return $this->hasMany(Multimedia::class, 'id', 'multimedia_id_1');
    }

    public function img2()
    {
      return $this->hasMany(Multimedia::class, 'id', 'multimedia_id_2');
    }

    public function img3()
    {
      return $this->hasMany(Multimedia::class, 'id', 'multimedia_id_3');
    }

    public function travels()
    {
    return $this->hasMany(Travel::class, 'mt', 'travel_mt');
    }
}
