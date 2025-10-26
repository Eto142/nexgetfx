<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debitprofit extends Model
{
    use HasFactory;
    protected $table = 'debitprofits';
    protected $fillable = [
        'user_id',
        'amount',
 
 
    ];
}
