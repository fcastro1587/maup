<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
  protected $conn = 'db3';

  protected $fillable = [
      'name',
    ];
    public function travels()
    {
      return $this->belongsToMany(Travel::class);
    }
}
