<?php

namespace App\Http\Controllers\Lesson;

use App\Http\Controllers\Controller;
use App\Parser\LduScraper\CoursePage;
use App\Models\Course;


class LessonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Course $course)
    {
        $coursePage = new CoursePage(auth()->user()->profile, $course->link_index);
        return $coursePage->getLesson();
    }
}
