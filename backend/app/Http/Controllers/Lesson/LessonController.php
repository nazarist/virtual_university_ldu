<?php

namespace App\Http\Controllers\Lesson;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Action\Lesson\ParseLessonsIfNotExistAction;
use App\Http\Resources\Lesson\TopicResourse;


class LessonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Course $course, ParseLessonsIfNotExistAction $action)
    {
        return TopicResourse::collection($action($course));
    }
}
