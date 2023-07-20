<?php

namespace App\Swagger\Profile;

use App\Http\Controllers\Controller;

/**
 * @OA\Post(
 *     path="/api/profile/create",
 *     summary="Store a new user profile",
 *     tags={"Profile"},
 *     security={{ "bearerAuth":{} }},
 *     @OA\RequestBody(
 *         required=true,
 *         description="User profile data",
 *         @OA\JsonContent(
 *             @OA\Property(property="ldu_login", type="string", example="n.nazar"),
 *             @OA\Property(property="ldu_password", type="string", example="232323"),
 *             @OA\Property(property="faculty_id", type="integer", example=1),
 *             @OA\Property(property="group", type="string", example="КН12с"),
 *             @OA\Property(property="course", type="integer", example=1)
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Successful creation of user profile",
 *         @OA\JsonContent(
 *             @OA\Property(property="ldu_login", type="string", example="n.nazar"),
 *             @OA\Property(property="ldu_password", type="string", example="232323"),
 *             @OA\Property(property="faculty", type="integer", example="Ад`юнктура"),
 *             @OA\Property(property="group", type="string", example="КН12с"),
 *             @OA\Property(property="course", type="integer", example=1)
 *         )
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Validation error",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="The given data was invalid."),
 *             @OA\Property(property="errors", type="object")
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Unauthenticated")
 *         )
 *     )
 * ),
 *
 *
 *
 *
 *
 *
 * @OA\Get(
 *     path="/api/profile/{id}",
 *     summary="Get user profile by ID",
 *     tags={"Profile"},
 *     security={{ "bearerAuth":{} }},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="ID of the user profile",
 *         required=true,
 *         @OA\Schema(
 *             type="integer",
 *             format="int64"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful retrieval of user profile",
 *         @OA\JsonContent(
 *             @OA\Property(property="ldu_login", type="string", example="n.nazar"),
 *             @OA\Property(property="ldu_password", type="string", example="232323"),
 *             @OA\Property(property="faculty", type="string", example="Ад`юнктура"),
 *             @OA\Property(property="group", type="string", example="КН12с"),
 *             @OA\Property(property="course", type="integer", example=1)
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="User profile not found",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="User profile not found")
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Unauthenticated")
 *         )
 *     )
 * )
 */


class ProfileSwagger extends Controller
{

}
