<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;

class UserController extends Controller
{
    public function getSelf()
    {
        return response()->json(new UserResource(auth()->user()));
    }
}
