<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
      protected $conn = 'db3';

      protected $table = "customer";
}
