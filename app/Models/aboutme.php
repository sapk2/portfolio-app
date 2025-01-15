<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aboutme extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'job_title',
        'bio',
        'skills',
        'education',
        'experience',
        'achievements',
        'hobbies',
        'goals',
    ];
}
