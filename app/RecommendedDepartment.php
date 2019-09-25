<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecommendedDepartment extends Model
{
    protected $conn = 'db3';

    protected $fillable = [
      'code_department',
      'travel_mt',
      'bloqueo_mt',
      'multimedia_id_1',
      'label_department',
      'active_item',
      'order_item',
    ];

    public function multimedia()
    {
      return $this->hasMany(Multimedia::class, 'id', 'multimedia_id_1');
    }

    public function travels()
    {
    return $this->hasMany(Travel::class, 'mt', 'travel_mt');
    }
}
