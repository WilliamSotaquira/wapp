<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function operations()
    {
        return $this->hasMany (Operation::class);
    }

    public function images()
    {
        return $this->morphMany('App\Models\Categories', 'imageable');
    }


}
