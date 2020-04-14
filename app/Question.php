<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $connection = 'mysql'; // se añadiran las dudas a la base de datos principal

}
