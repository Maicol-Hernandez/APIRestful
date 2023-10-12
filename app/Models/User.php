<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected const USER_VERIFIED = '1';
    protected const USER_UNVERIFIED = '0';

    protected const USER_IS_ADMIN = 'true';
    protected const USER_NOT_ADMIN = 'false';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'verified',
        'verification_token',
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'verification_token',
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


    public function isVerified(): bool
    {
        return $this->verified == self::USER_VERIFIED;
    }

    public function isAdmin(): bool
    {
        return $this->is_admin == self::USER_IS_ADMIN;
    }

    public static function generateVerificationToken(): string
    {
        return Str::random(40);
    }
}
