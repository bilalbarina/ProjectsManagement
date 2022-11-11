<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'token',
        'promotion_id',
        'photo_color'
    ];

    public $timestamps = true;

    protected function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }
    
    protected function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
