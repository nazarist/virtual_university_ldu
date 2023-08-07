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
 *                 @OA\Property(property="ldu_login", type="string", example="n.iliasevych"),
 *                 @OA\Property(property="ldu_password", type="string", example="45895"),
 *                 @OA\Property(property="faculty", type="integer", example="Ад`юнктура"),
 *                 @OA\Property(property="group", type="string", example="КН12с"),
 *                 @OA\Property(property="course", type="string", example="Навчально-науковий інститут цивільного захисту")
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
 * ),
 *
 * 
 * @OA\Get(
 *     path="/api/user/{user}",
 *     operationId="getUser",
 *     tags={"User"},
 *     summary="Get user information",
 *     description="Returns user information",
 *     security={{ "bearerAuth":{} }},
 *     @OA\Parameter(
 *         name="user",
 *         in="path",
 *         required=true,
 *         description="ID of the user",
 *         @OA\Schema(
 *             type="integer",
 *             format="int64"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="User information",
 *         @OA\JsonContent(
 *             @OA\Property(property="name", type="string", example="nazar"),
 *             @OA\Property(property="full_name", type="string", example="Назар Ілясевич"),
 *             @OA\Property(property="group", type="string", example="КН12с")
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="User not found",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="User not found")
 *         )
 *     ),
 * )
 */


class UserSwagger extends Controller
{

}
