<?php

namespace App\Models\Faculty;

use Database\Factories\FacultyFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected static function newFactory(): FacultyFactory
    {
        return FacultyFactory::new();
    }

}
