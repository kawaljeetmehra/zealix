<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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
        'email',
        'salesman_id',
        'password',
        'Username',
        'role_id',
        'distributor_id',
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

    public function distributor()
    {
        return $this->belongsTo(Distributors::class, 'distributor_id');
    }

    public function salesman()
    {
        return $this->belongsTo(Salesman::class, 'salesman_id');
    }


    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($user) {
            // Delete associated distributor record if it exists
            if ($user->distributor) {
                $user->distributor->delete();
            }
            
            // Delete associated salesman record if it exists
            if ($user->salesman) {
                $user->salesman->delete();
            }
        });
    }

}
