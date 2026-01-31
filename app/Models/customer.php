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

  public function setPasswordAttribute($value)
{
    if (!str_starts_with($value, '$2y$')) {
        $this->attributes['password'] = Hash::make($value);
    } else {
        $this->attributes['password'] = $value;
    }
}

}
