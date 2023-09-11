<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tax',
        'price',
        'previous_price',
        'measure',
        'by_fraction',
        'efficiency',
        'maslow_value',
    ];

    public function operations()
    {
        return $this->hasMany(Operation::class);
    }
}
