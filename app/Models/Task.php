<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //

    protected $fillable = ['title', 'description', 'status', 'user_id', 'user_assigned'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'user_assigned');
    }

}
