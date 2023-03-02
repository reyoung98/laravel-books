<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class BookUser extends Pivot
{
    public function books()
    {
        return $this->belongsToMany(Book::class); 
    }

    public function users()
    {
        return $this->belongsToMany(User::class); 
    }
}
