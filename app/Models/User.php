<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'email', 'password'])]
class User extends Model
{
    public function todos()
    {
        return $this->hasMany(Todo::class);
    }
}
