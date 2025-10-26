<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $fillable = [
        'user_id', // Assuming there's a user_id foreign key in the transactions table
        'credit',
        'debit',
        'transaction_id',
        'transaction_type',
        'transaction',
        'credit',
        'debit',
        'status',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
