<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subtask extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity',
        'description',
        'duration',
        'priority',
        'status',
        'progress',
        'start_at',
        'start_time',
        'end_at',
        'end_time',
        // 'task_id',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
