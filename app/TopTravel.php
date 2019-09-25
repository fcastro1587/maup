<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopTravel extends Model
{
    protected $conn = 'db3';

    protected $fillable = [
      'top_travel_mt',
      'top_travel_code',
      'order',
    ];

    public function travels()
    {
      return $this->belongsToMany(Travel::class);
    }
}
