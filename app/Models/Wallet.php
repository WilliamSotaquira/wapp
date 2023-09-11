<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'value',
        // 'user_id',
    ];

     // Realcion uno a muchos inversa
     public function budget()
     {
         return $this->hasMany(Budget::class);

     }

     public function user(){
        return $this->belongsTo(User::class);
     }
}

