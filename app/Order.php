<?php

namespace App;

use App\OrderItem;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     protected $fillable = [
        'name', 'phone', 'email', 'address', 'city'
    ];

    public function orderItem()
    {

    	return $this->hasMany(OrderItem::class);
    }
}
