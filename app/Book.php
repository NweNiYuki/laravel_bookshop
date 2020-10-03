<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
   public function categories()
    {
    	return $this->belongsTo(Category::class, 'category_id');
    }
}
