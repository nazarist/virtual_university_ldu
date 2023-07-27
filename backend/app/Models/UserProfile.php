<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Faculty;
use App\Models\Course;


class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'f_name',
        'l_name',
        'moodle_session',
        'session_at',
        'ldu_login',
        'ldu_password',
        'faculty_id',
        'group_id',
        'course',
        'user_id',
    ];


    public function faculty(): BelongsTo
    {
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }


    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class, 'group_id');
    }
}
