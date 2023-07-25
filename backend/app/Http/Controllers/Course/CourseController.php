<?php

namespace App\Http\Controllers\Course;

use App\Action\Course\ParseCoursesIfNotExistAction;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(ParseCoursesIfNotExistAction $action)
    {
        return $action();


    }
}
