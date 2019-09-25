<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeasonTravel extends Model
{
  protected $conn = 'db3';

  protected $fillable = [
    'travel_mt',
    'bloqueo_mt',
    'season_code_season',
    'home',
    'section',
    'multimedia_id_1',
    'multimedia_id_2',
    'multimedia_id_3',
    'multimedia_id_4',
    'order_item',
    'active_item',
  ];

    /*public function travels()
    {
      return $this->hasMany(Travel::class, 'mt', 'travel_mt' );
    }*/

    public function travels()
    {
    return $this->belongsTo(Travel::class, 'travel_mt', 'mt');
    }



    public function seasons()
    {
      return $this->hasMany(Season::class, 'code_season', 'season_code_season');
    }

    /*public function img1()
    {
      return $this->hasMany(Multimedia::class, 'id', 'multimedia_id_1');
    }*/

    public function img1()
    {
      return $this->belongsTo(Multimedia::class, 'multimedia_id_1', 'id');
    }



    public function img2()
    {
      return $this->belongsTo(Multimedia::class, 'multimedia_id_2', 'id');
    }

    public function img3()
    {
      return $this->belongsTo(Multimedia::class, 'multimedia_id_3', 'id');
    }

    public function img4()
    {
      return $this->belongsTo(Multimedia::class, 'multimedia_id_4', 'id');
    }
}
