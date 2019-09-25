<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $conn = 'db3';

    protected $fillable = [
      'offer_mt',
      'bloqueo_mt',
      'department_code',
      'order',
    ];
    public function travels()
    {
      return $this->belongsToMany(Travel::class);
    }
}
