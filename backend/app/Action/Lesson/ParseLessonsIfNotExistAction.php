<?php

namespace App\Action\Lesson;

use App\Models\Course;
use App\Models\Topic;
use App\Parser\LduScraper\CoursePage;
use Illuminate\Database\Eloquent\Collection;

class ParseLessonsIfNotExistAction
{
    public function __invoke(Course $course): array|Collection
    {
        $topicIsNotExists = Topic::query()
            ->where('course_id', $course->id)
            ->doesntExist();

        if ($topicIsNotExists) {
            $coursePage = new CoursePage($course);
            $coursePage->parseAndSaveLessons();
        }
        
        return Topic::query()->where('course_id', $course->id)->get(); 
    }   
}
