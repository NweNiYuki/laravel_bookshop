<?php

namespace App;

use App\Book;
use App\Order;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    public function order()
    {
    	return $this->belongsTo(Order::class);
    }


    public function book()
    {
    	return $this->belongsTo(Book::class);
    }

    public function orderItem()
    {

    	return $this->hasMany(OrderItem::class);
    }
}
