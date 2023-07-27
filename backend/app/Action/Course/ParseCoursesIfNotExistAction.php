<?php

namespace App\Action\Course;

use App\Models\Course;
use App\Models\Group;
use App\Parser\LduScraper\MainPage;
use Illuminate\Database\Eloquent\Collection;

class ParseCoursesIfNotExistAction
{
    public function __invoke(): array|Collection
    {
        $mainPage = new MainPage(auth()->user()->profile);
        $mainPage->parseCourses();
        
        $profile = auth()->user()->profile;

        $groupIsNotExists = Course::query()
            ->where('group_id', $profile->group_id)
            ->doesntExist();

        if ($groupIsNotExists) {
            $mainPage = new MainPage($profile);

            $data = [];
            foreach ($mainPage->parseCourses() as $course) {
			   $data[] = Course::create($course);
			}

			return $data;
        }

        return Course::query()->where('group_id', $profile->group_id)->get(); 
    }   
}
