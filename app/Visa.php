<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visa extends Model
{
    protected $conn = 'db3';
    
    protected $fillable = [
      'country_code',
      'description',
    ];
}
