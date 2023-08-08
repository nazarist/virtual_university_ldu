<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Topic;


class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'link_index', 'group_id'
    ];


    public function topics(): HasMany
    {
        return $this->HasMany(Topic::class, 'course_id');
    }



}
