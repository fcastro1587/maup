<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revista extends Model
{
   protected $conn = 'db3';
   protected $table = 'revistas';

   protected $fillable = [
     'tipo_revista',
     'mes',
     'anio',
     'descripcion',
     'url',
     'activo',
   ];

}
