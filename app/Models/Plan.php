<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    public function faults()
    {
        return $this->hasMany(Fault::class);
    }

    public function contributions()
    {
        return $this->hasMany(Contribution::class);
    }

    public function credits()
    {
        return $this->hasMany(Credit::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
