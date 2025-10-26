<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    use HasFactory;
    protected $table = 'withdrawals';
    protected $fillable = [
        'user_id',
        'amount',
        'amount_charges',
        'status',
        'mode',
        'account_number',
        'account_name',
        'bank_name',
        'bank_routing_number',
        'bank_country',
        'crypto_type',
        'wallet_address',    
 
    ];

    public function user()
    {
       return $this->belongsTo(User::class, 'user_id','id');
    }
}
