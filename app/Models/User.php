<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['name', 'email', 'password'])]
class User extends Authenticatable
{
    public function todos()
    {
        return $this->hasMany(Todo::class);
    }
}
