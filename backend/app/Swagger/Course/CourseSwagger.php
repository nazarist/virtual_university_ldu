<?php

namespace App\Swagger\Course;

use App\Http\Controllers\Controller;

/**
 * @OA\Get(
 *     path="/api/courses",
 *     operationId="getCourseList",
 *     tags={"Courses"},
 *     summary="Parse and get the list of courses",
 *     description="Returns a list of courses",
 *     security={{ "bearerAuth":{} }},
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *              	property="data", 
 *              	type="array",
 *              	@OA\Items(
 *              		@OA\Property(property="id", type="integer", format="int64", example=1),
 *              		@OA\Property(property="name", type="string", example="Українська мова та культура"),
 *              		@OA\Property(property="link_index", type="integer", format="int32", example=1212),
 *              	),
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


class CourseSwagger extends Controller
{

}



