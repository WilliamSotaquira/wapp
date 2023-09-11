<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'details',
        'payment',
        'grand',
        'status',
        'type',
        'transaction_date',
        'payment_installments',
        'payment_number',
        'autorization_number',
        'agreed_rate',
        'billed_EA',

    ];

    public function images()
    {
        return $this->morphMany('App\Models\Image', 'imageable');
    }

    public function operations()
    {
        return $this->hasMany(Operation::class);
    }

    public function budgets()
    {
        return $this->belongsTo(Budget::class);
    }

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }


}
