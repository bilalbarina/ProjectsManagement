<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectStudent extends Model
{
    protected $table = 'project_student';
    
    protected $fillable = [
        'project_id',
        'student_id'
    ];

    public $timestamps =true;
}
