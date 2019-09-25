<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
  protected $conn = 'db3';

  protected $fillable = [
    'department',
    'title',
    'especial_itinerary',
  ];

    public function travels()
    {
      return $this->belongsToMany(Travel::class, 'tour_travel', 'travel_mt', 'tour_id', 'mt', 'id');
    }

    public function scopeTour($query, $name)
    {
      if (trim($name) != "") {
        $query->where(\DB::raw("CONCAT(department, ' ',title)"), "LIKE", "%$name%");
      }
    }
}
