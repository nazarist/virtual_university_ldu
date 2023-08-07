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
 *             @OA\Property(property="ldu_login", type="string", example="n.iliasevych"),
 *             @OA\Property(property="ldu_password", type="string", example="45895"),
 *             @OA\Property(property="faculty_id", type="integer", example=1),
 *             @OA\Property(property="group_id", type="integer", example=97),
 *             @OA\Property(property="course", type="integer", example=1)
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Successful creation of user profile",
 *         @OA\JsonContent(
 *             @OA\Property(property="ldu_login", type="string", example="n.iliasevych"),
 *             @OA\Property(property="ldu_password", type="string", example="45895"),
 *             @OA\Property(property="faculty", type="integer", example="Ад`юнктура"),
 *             @OA\Property(property="group", type="string", example="КН12с"),
 *             @OA\Property(property="course", type="string", example="Навчально-науковий інститут цивільного захисту")
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
 * )
 *
 */


class ProfileSwagger extends Controller
{

}
