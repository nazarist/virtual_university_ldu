<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'ldu_login',
        'ldu_password',
        'faculty_id',
        'group',
        'course',
        'user_id',
    ];
}
