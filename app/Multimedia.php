<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Multimedia extends Model
{
    protected $conn = 'db3';

    protected $fillable = [
      'name',
      'title',
      'country',
      'city',
      'description',
      'size',
      'type',
    ];
    
    public function travels()
    {
      return $this->belongToMany(Travel::class, 'multimedia_travel', 'travel_mt', 'multimedia_id', 'mt', 'id');
    }
}
