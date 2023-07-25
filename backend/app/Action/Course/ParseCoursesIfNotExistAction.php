<?php

namespace App\Action\Course;

use App\Models\Course;
use App\Parser\LduScraper\MainPage;

class ParseCoursesIfNotExistAction
{
    public function __invoke()
    {
        $user = auth()->user();

        if (!$user->courses()->exists()) {
            $mainPage = new MainPage($user->profile);

            $data = [];
            foreach ($mainPage->parseCourses() as $course) {
				   $data[] = Course::create(array_merge($course, ['user_id' => auth()->id()]));
				}
				return $data;
        }else {
        		return Course::query()->where('user_id', $user->id)->get();
        }


    }
}
