<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

#[Fillable(['user_id', 'title', 'description', 'status', 'priority', 'due_date'])]
class Todo extends Model
{
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
