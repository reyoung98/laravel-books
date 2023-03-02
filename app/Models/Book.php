<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // defining a relationship
    public function authors()
    {
        return $this->belongsToMany(Author::class); // no need to use Author class, in same namespace
    }

    public function publishers()
    {
        return $this->belongsToMany(Publisher::class); 
    }

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_1_id'); 
    }

    public function books()
    {
        return $this->belongsToMany(Book::class); 
    }
}
