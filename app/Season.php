<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $conn = 'db3';

    public function travels()
    {
      return $this->belongsToMany(Travel::class, 'season_travels', 'season_code_season','travel_mt', 'code_season', 'mt');
    }

}
