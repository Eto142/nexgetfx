<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Earning;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lname',
        'currency',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function userEarnings()
    {
       return $this->hasMany(Earning::class, 'user_id','id');
    }


  
    
        public function debitprofit()
    {
        return $this->hasMany(Debitprofit::class, 'user_id');
    }



    public function referral()
    {
        return $this->hasOne(Refferal::class, 'user_id'); // Assuming 'user_id' is the foreign key in the 'kycs' table
    }

    public function profit()
    {
        return $this->hasOne(Profit::class, 'user_id'); // Assuming 'user_id' is the foreign key in the 'kycs' table
    }
    
    public function withdrawal()
    {
        return $this->hasOne(Withdrawal::class, 'user_id'); // Assuming 'user_id' is the foreign key in the 'kycs' table
    }

    
        public function deposit()
    {
        return $this->hasOne(Deposit::class, 'user_id'); // Assuming 'user_id' is the foreign key in the 'kycs' table
    }
    
    
            public function transaction()
    {
        return $this->hasOne(Transaction::class, 'user_id'); // Assuming 'user_id' is the foreign key in the 'kycs' table
    }


 


       public function transfer()
    {
        return $this->hasOne(Transfer::class, 'user_id'); // Assuming 'user_id' is the foreign key in the 'kycs' table
    }
    
        public function transferhistory()
    {
        return $this->hasOne(TransferHistory::class, 'user_id'); // Assuming 'user_id' is the foreign key in the 'kycs' table
    }
  

    
}
