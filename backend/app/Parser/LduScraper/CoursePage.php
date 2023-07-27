<?php

namespace App\Parser\LduScraper;

use App\Models\UserProfile;
use App\Parser\LduUniversity;
use DiDom\Document;
use Illuminate\Support\Facades\Storage;
use App\Parser\Contracts\ParserContract;
use DiDom\Element;

class CoursePage extends LduUniversity 
{
    protected string $pageLink;

    public function __construct(UserProfile $profile, int $linkId)
    {
        parent::__construct($profile);

        $this->pageLink = 'http://virt.ldubgd.edu.ua/course/view.php?id='.$linkId;


        $fileName = explode('?', $this->pageLink)[1] . '.html';

        if (Storage::disk('local')->exists($fileName)){
            $this->pageContent = Storage::disk('local')->get($fileName);
        }else{
            $this->pageContent = $this->parsePage($this->pageLink);
            Storage::disk('local')->put($fileName, $this->pageContent);
        }
    }


    public function getPage(): string
    {
        return $this->pageContent;
    }



    public function getLesson()
    {
        $contents = $this->document()->find('.main');


        $topic = [];
        foreach ($contents as $content){
            $title = $content->first('.sectionname > span')->text();// section name

            $lessons = [];
            foreach($content->find('.activity') as $activity){// activity - is one element in section
                if ($lesson = $this->getLessonWithType($activity)) {
                    $lessons[] = $lesson;
                }
            }

            $topic[] = compact('title', 'lessons');
        }

        return $topic;
    }


    protected function getActivityType(Element $activity): string
    {
        return explode(' ', $activity->attr('class'))[1];
    }



    protected function getLessonWithType(Element $activity): array|false
    {
        $typeWithLink   = ['url','quiz','resource','folder'];// type lesson link
        $typeWitoutLink = ['label'];
        
        $type = $this->getActivityType($activity);

        if (in_array($type, $typeWithLink)) {
            $data =  [
                'type' => $type,
                'name' => $activity->first('.instancename')->firstChild()->text(),
                'link_index' => $this->getLinkIndex($activity),
            ];
            $content = $this->contentAfterLink($activity);
            return $content
                ? array_merge($data, ['content' => $content])
                : $data;


        }
     
        if (in_array($type, $typeWitoutLink)){
            return [
                'type' => $type,
                'name' => $activity->text(),
            ];
        }

        return false;
    }



    protected function contentAfterLink(Element $activity)
    {   
        if ($activity->has('.contentafterlink')) {
            return [
                'text' =>$activity->text()
            ];
        }
        return false;

    }
}
