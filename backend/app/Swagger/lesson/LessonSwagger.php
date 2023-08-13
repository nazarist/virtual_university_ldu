<?php

namespace App\Swagger\lesson;

use App\Http\Controllers\Controller;


/**
 * @OA\Get(
 *     path="/api/courses/{course}/lessons",
 *     operationId="getLessonList",
 *     tags={"Lessons"},
 *     summary="Parse and get the list of Lessons",
 *     description="Returns a list of Lessons",
 *     security={{ "bearerAuth":{} }},
 *     @OA\Parameter(
 *         name="course",
 *         in="path",
 *         required=true,
 *         description="ID of the course",
 *         @OA\Schema(
 *             type="integer",
 *             format="int64"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful get lessons",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *              	property="data", 
 *              	type="object",
 *              	
 *              		@OA\Property(property="title", type="string", example="УКРАЇНСЬКА МОВА ТА КУЛЬТУРА"),
 *               		@OA\Property(
 *     					    property="lesson",
 *     					    type="array",
 *     					    @OA\Items(
 *     					        @OA\Property(property="text", type="string", example="Силабус"),
 *     					        @OA\Property(property="type", type="string", example="resource")
 *     					    )
 *     					),
 *              
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
 */

class LessonSwagger extends Controller
{

}
