<?php

namespace App\Http\Controllers\Lesson;

use App\Http\Controllers\Controller;
use App\Parser\LduScraper\CoursePage;


class LessonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $courseParser = new CoursePage(auth()->user()->profile, 'http://virt.ldubgd.edu.ua/course/view.php?id=3076');

        return $courseParser->getLesson();
    }
}
