<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sprint extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'workhours',
        'start_at',
        'end_at',
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
