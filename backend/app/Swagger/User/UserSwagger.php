<?php

namespace App\Swagger\User;

use App\Http\Controllers\Controller;



/**
 * @OA\Get(
 *     path="/api/user/self",
 *     summary="Get authenticated self user",
 *     tags={"User"},
 *     security={{ "bearerAuth":{} }},
 *     @OA\Response(
 *         response=200,
 *         description="Successful retrieval of authenticated user's profile",
 *         @OA\JsonContent(
 *             @OA\Property(property="name", type="string", example="nazar"),
 *             @OA\Property(property="email", type="string", example="nazar@gmail.com"),
 *             @OA\Property(
 *                 property="profile",
 *                 nullable=true,
 *                 type="object",
 *                 @OA\Property(property="ldu_login", type="string", example="n.nazar"),
 *                 @OA\Property(property="ldu_password", type="string", example="2323232"),
 *                 @OA\Property(property="faculty", type="string", example="Ад`юнктура"),
 *                 @OA\Property(property="group", type="string", example="КН12с"),
 *                 @OA\Property(property="course", type="integer", example=1)
 *             )
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

class UserSwagger extends Controller
{

}
