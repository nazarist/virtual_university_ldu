<?php

namespace App\Action\Course;

use App\Models\Course;
use App\Models\Group;
use App\Parser\LduScraper\HomePage;
use Illuminate\Database\Eloquent\Collection;

class ParseCoursesIfNotExistAction
{
    public function __invoke(): array|Collection
    {
        $homePage = new HomePage(auth()->user()->profile);
        $homePage->parseCourses();
        
        $profile = auth()->user()->profile;

        $groupIsNotExists = Course::query()
            ->where('group_id', $profile->group_id)
            ->doesntExist();

        if ($groupIsNotExists) {
            $homePage = new HomePage($profile);

            $data = [];
            foreach ($homePage->parseCourses() as $course) {
			   $data[] = Course::create($course);
			}

			return $data;
        }

        return Course::query()->where('group_id', $profile->group_id)->get(); 
    }   
}
