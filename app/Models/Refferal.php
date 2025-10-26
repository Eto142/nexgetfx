<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refferal extends Model
{
    use HasFactory;
    protected $table = 'refferals';
    protected $fillable = [
        'user_id',
        'amount',

 
    ];

    public function user()
    {
       return $this->belongsTo(User::class, 'user_id','id');
    }
}
