<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id', 'title'
    ]; 


    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class, 'topic_id');
    }
}
