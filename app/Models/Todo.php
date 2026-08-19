<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['user_id', 'title', 'description', 'status', 'priority', 'due_date'])]
class Todo extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
