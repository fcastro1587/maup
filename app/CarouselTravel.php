<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarouselTravel extends Model
{
    protected $conn = 'db3';

    protected $fillable = [
      'carousel_travel_mt',
      'bloqueo_mt',
      'carousel_travel_code',
      'order',
      'multimedia_id',
      'active',
    ];

    public function carouselmulti()
    {
    return $this->hasMany(Multimedia::class, 'id', 'multimedia_id');
    }

    public function travels()
    {
    return $this->hasMany(Travel::class, 'mt', 'carousel_travel_mt');
    }
}
