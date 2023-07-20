<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\UserProfileDataRequest;
use App\Http\Resources\Profile\ProfileResource;
use App\Models\UserProfile;
use Illuminate\Http\JsonResponse;


class ProfileController extends Controller
{
    public function store(UserProfileDataRequest $request): JsonResponse
    {
        $profile = UserProfile::create($request->validated());

        return response()->json(new ProfileResource($profile), 201);
    }



    public function show(UserProfile $profile): JsonResponse
    {
        return response()->json(new ProfileResource($profile));
    }
}
