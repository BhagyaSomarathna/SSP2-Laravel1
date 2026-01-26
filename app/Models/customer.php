<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $fillable =[
        'customer_name',
        'address',
        'password',
        'email_address',
        'contact_number',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
