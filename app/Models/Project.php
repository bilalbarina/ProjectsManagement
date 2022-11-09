<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'delivery_date',
        'due_date',
    ];

    protected $casts = [
        'delivery_date' => 'datetime',
        'due_date' => 'datetime',
    ];

    public $timestamps =  true;

    protected function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
