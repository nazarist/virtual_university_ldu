<?php

namespace App\Models\Group;

use Database\Factories\GroupFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected static function newFactory(): GroupFactory
    {
        return GroupFactory::new();
    }
}
