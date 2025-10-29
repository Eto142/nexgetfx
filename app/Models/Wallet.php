<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = [
        'method',          // ✅ allow mass assignment
        'address',
        'destination_tag'
    ];
}
