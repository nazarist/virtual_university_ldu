<?php

namespace App\Http\Controllers\Lesson;

use App\Parser\LduScraper\StandartPage;
use App\Http\Controllers\Controller;
use App\Parser\LduScraper\CoursePage;
use App\Models\Course;
use Illuminate\Support\Facades\Storage;
use thiagoalessio\TesseractOCR\TesseractOCR;
use Illuminate\Support\Facades\Http;


class LessonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    private function test()
    {
        return 'test';
    }

    public function index(Course $course)
    {
        $coursePage = new CoursePage($course->link_index);
        return $coursePage->getLesson();
    }
}
