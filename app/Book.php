<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
	 protected $fillable = [
        'title', 'author', 'summary', 'price', 'category_id', 'cover'
    ];

   public function categories()
    {
    	return $this->belongsTo(Category::class, 'category_id');
    }
}
