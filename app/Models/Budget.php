<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{

    use HasFactory;

    protected $fillable = [
        'name',
        'purpose',
        'value',
    ];

    // relación uno a muchos
    public function wallets()
    {
        return $this->belongsTo('/app/Models/Wallet');
    }

    public function operations()
    {
        return $this->hasMany(Operation::class);
    }

    public function projects()
    {
        return $this->belongsTo(Project::class);
    }


}

