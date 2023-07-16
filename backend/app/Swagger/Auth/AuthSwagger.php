<?php

namespace App\Swagger\Auth;

use App\Http\Controllers\Controller;

/**
 * @OA\Post(
 *     path="/users",
 *     summary="Adds a new user - with oneOf examples",
 *     @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(
 *                     property="id",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="name",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="phone",
 *                     oneOf={
 *                     	   @OA\Schema(type="string"),
 *                     	   @OA\Schema(type="integer"),
 *                     }
 *                 ),
 *                 example={"id": "a3fb6", "name": "Jessica Smith", "phone": 12345678}
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *             @OA\Examples(example="result", value={"success": true}, summary="An result object."),
 *             @OA\Examples(example="bool", value=false, summary="A boolean value."),
 *         )
 *     )
 * )
 */
class AuthSwagger extends Controller
{

}
