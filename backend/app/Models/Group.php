<?php

namespace App\Models;

use Database\Factories\GroupFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'faculty_id'
    ];




    public function userProfile(): HasMany
    {
        return $this->hasMany(UserProfile::class, 'group_id');
    }


    public function courses(): HasMany
    {
        return $this->hasMany(Course::class, 'group_id');
    }
}
