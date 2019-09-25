<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MultimediaTravel extends Model
{
    protected $conn  = 'db3';
    protected $table = 'multimedia_travel';
 
    protected $fillable = [
      'travel_mt',
      'bloqueo_mt',
      'multimedia_id',
      'multimedia_id_2',
    ];

    public function multimedia()
    { 
      return $this->hasMany(Multimedia::class, 'id', 'multimedia_id');
    }
}
