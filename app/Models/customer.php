<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class customer extends Authenticatable
{
    use HasApiTokens, HasProfilePhoto, Notifiable;

    protected $table = 'customer';

    protected $fillable = [
        'customer_name',
        'address',
        'password',
        'email_address',
        'contact_number',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relationship with orders
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
/**
     * This tells Laravel which column to use for login.
     */
    public function getAuthIdentifierName()
    {
        return 'email_address';
    }

    /**
     * This tells Laravel which column to use for password resets.
     */
    public function getEmailForPasswordReset()
    {
        return $this->email_address;
    }
}