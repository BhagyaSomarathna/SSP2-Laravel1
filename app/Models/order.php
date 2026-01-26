<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable =[
        'order_date',
        'delivery_date',
        'amount',
        'customer_ID',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function items()
    {
        return $this->belongsToMany(Item::class)
                    ->withPivot('quantity')
                    ->withTimestamps();
    }
}
