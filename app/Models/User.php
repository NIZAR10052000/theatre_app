<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'is_verified',
    ];

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isTroupe()
    {
        return $this->role === 'troupe';
    }

    public function isUser()
    {
        return $this->role === 'user' || $this->role === 'client';
    }

    public function isVerified()
    {
        return $this->is_verified == true;
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}