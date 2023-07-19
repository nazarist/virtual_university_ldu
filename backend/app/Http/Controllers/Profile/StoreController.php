<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\UserProfileDataRequest;


class StoreController extends Controller
{
    public function createProfileData(UserProfileDataRequest $request)
    {
        $formData = $request->validated();

    }
}
