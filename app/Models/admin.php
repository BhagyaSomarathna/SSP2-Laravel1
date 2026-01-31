<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    protected $table = 'admins';
    
    protected $fillable =[
        'admin_name',
        'admin_password',
        'admin_email',

    ];

     protected $hidden = [
        'admin_password',
    ];

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

     public function categories()
    {
        return $this->hasMany(Category::class);
    }


}
