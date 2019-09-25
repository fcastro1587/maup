<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
  protected $conn = 'db3';

  protected $fillable = [
    'header_mt',
    'bloqueo_mt',
    'header_department',
    'img',
    'order',
    'active_head',
  ];

public function travels()
{
return $this->hasMany(Travel::class, 'mt', 'header_mt');
}

public function multi()
{
return $this->hasMany(Multimedia::class, 'id', 'img');
}

}
