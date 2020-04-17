<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //un rol puede pertenecer a varios usuarios (1:N)
    public function user()
    {
        return $this->hasMany(User::class);
    }
}
