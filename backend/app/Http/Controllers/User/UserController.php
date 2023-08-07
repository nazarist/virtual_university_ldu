<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserSelfResource;
use App\Http\Resources\User\UserResource;
use App\Models\User;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getSelf()
    {
        return response()->json(new UserSelfResource(auth()->user()));
    }


    public function show(User $user)
    {
        return new UserResource($user);
    }

}
