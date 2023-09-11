<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'description',
        'priority',
        'end_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function budget()
    {
        return $this->belongsTo('App\Models\Budget');
    }

    public function tasks()
    {
        return $this->hasMany('App\Models\Task');
    }

}
