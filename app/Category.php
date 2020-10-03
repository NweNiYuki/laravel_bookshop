<?php

namespace App;

use App\Book;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     
     
    public function book()
    {
    	return $this->hasmany(Book::class,'book');
    }
}
