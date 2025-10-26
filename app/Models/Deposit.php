<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Deposit extends Model
{
    use HasFactory;
    protected $table = 'deposits';
    protected $fillable = [
        'user_id',
        'amount',
        'payment_method',
        'image',
        'status',
 
    ];

    public function user()
    {
       return $this->belongsTo(User::class, 'user_id','id');
    }
}
