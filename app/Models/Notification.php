<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User; // <-- Import User model

class Notification extends Model
{
    // Allow mass assignment for these fields
    protected $fillable = [
        'user_id',
        'message',
        'is_read',
    ];

    // Relationship to User
   public function user()
    {
       return $this->belongsTo(User::class, 'user_id','id');
    }
}
