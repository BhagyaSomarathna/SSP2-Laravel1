<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{

    protected $table = 'item';
    
    protected $fillable =[
        'item_name',
        'category_name',
        'price',
        'description',
        'img',

    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class)
                    ->withPivot('quantity')
                    ->withTimestamps();
    }
}
