<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Congratulation extends Model
{
    protected $conn = 'db3';
    
    protected $fillable = [
      'name',
      'title',
      'description',
    ];

    public function scopeSearch($query, $name)
    {
      if (trim($name) != "") {
        $query->where(\DB::raw("CONCAT(name, ' ', title)"), "LIKE", "%$name%");
      }
    }
}
