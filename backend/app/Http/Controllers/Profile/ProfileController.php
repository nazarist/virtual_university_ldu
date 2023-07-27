<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\UserProfileDataRequest;
use App\Http\Resources\Profile\ProfileResource;
use App\Models\UserProfile;
use Illuminate\Http\JsonResponse;
use App\Action\Profile\CreateUserProfileAction;


class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(UserProfileDataRequest $request, CreateUserProfileAction $action): JsonResponse
    {    
        $profile = $action($request->validated());

        return response()->json(new ProfileResource($profile), 201);
    }



    public function show(UserProfile $profile): JsonResponse
    {
        return response()->json(new ProfileResource($profile));
    }
}
