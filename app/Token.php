<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Token extends Model
{
    //un token pertenece a un usuario (1:1)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
