<?php

namespace App\Models\UserData;

use Database\Factories\UserDataFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    use HasFactory;

    protected static function newFactory(): UserDataFactory
    {
        return UserDataFactory::new();
    }
}
