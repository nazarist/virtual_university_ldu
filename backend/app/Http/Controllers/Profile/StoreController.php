<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\CreateUserDataRequest;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function createUserData(CreateUserDataRequest $request)
    {
        $formData = $request->validated();
        return auth()->user();
    }
}
