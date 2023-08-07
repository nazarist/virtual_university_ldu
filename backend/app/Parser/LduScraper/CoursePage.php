<?php

namespace App\Parser\LduScraper;


use App\Parser\LduUniversity;
use App\Models\Topic;
use App\Models\Lesson;
use App\Models\Course;
use Illuminate\Support\Facades\Storage;
use thiagoalessio\TesseractOCR\TesseractOCR;
use DiDom\Element;
use thiagoalessio\TesseractOCR\UnsuccessfulCommandException;

class CoursePage extends LduUniversity 
{
    protected string $pageLink;

    protected Course $course;

    public function __construct(Course $course)
    {
        parent::__construct(auth()->user()->profile);

        $this->pageLink = 'http://virt.ldubgd.edu.ua/course/view.php?id='.$course->link_index;
        $this->course = $course;

        $fileName = explode('?', $this->pageLink)[1] . '.html';

        if (Storage::disk('local')->exists($fileName)){
            $this->pageContent = Storage::disk('local')->get($fileName);
        }else{
            $this->pageContent = $this->parse($this->pageLink);
            Storage::disk('local')->put($fileName, $this->pageContent);
        }
    }


    public function getPage(): string
    {
        return $this->pageContent;
    }



    public function parseLessons(): array
    {
        $contents = $this->document()->find('.main');// sections


        $topic = [];
        foreach ($contents as $content){
            if(!$content->has('.sectionname > span')) continue; //if has no title   

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


    public function parseAndSaveLessons(): void
    {
        foreach($this->parseLessons() as $topic){
            $topicFromDb = Topic::create([
                'title' => $topic['title'],
                'course_id' => $this->course->id,
            ]);


            foreach($topic['lessons'] as $lesson){
                $lesson['topic_id'] = $topicFromDb->id;
                Lesson::create($lesson);
            }
        }
    }


    protected function getActivityType(Element $activity): string
    {
        return explode(' ', $activity->attr('class'))[1];
    }


    protected function contentAfterLink(Element $activity): array
    {   
        $data = $activity->first('.contentafterlink .no-overflow');

        dd($data->text());
        
        return [
            'text' =>$data->text()
        ];
    }


    protected function getLessonWithType(Element $activity): array|false
    {
        $typeWithLink   = ['url', 'quiz', 'resource', 'folder', 'label'];// type lesson link
        
        $type = $this->getActivityType($activity);

        if (!in_array($type, $typeWithLink)) {
            return false;
        }

        if($data = call_user_func([$this, $type], $activity)){
            return array_merge($data, ['type' => $type]);
        }

        return false;
    }




    private function url(Element $activity): array
    {
        return [
            'text' => $activity->first('.instancename')->firstChild()->text(),
            'link_index' => $this->getLinkIndex($activity),
        ];
    }


    private function quiz(Element $activity): array
    {
        return [
            'text' => $activity->first('.instancename')->firstChild()->text(),
            'link_index' => $this->getLinkIndex($activity),
        ];
    }


    private function resource(Element $activity): array
    {
        return [
            'text' => $activity->first('.instancename')->firstChild()->text(),
            'link_index' => $this->getLinkIndex($activity),
        ];
    }


    private function folder(Element $activity): array
    {
        return [
            'text' => $activity->first('.instancename')->firstChild()->text(),
            'link_index' => $this->getLinkIndex($activity),
        ];
    }


    private function label(Element $activity): array
    {
        if($activity->has('img')){
            $disk = Storage::build([
                    'driver' => 'local',
                    'root' => 'wedlabel',
                ]);

            $imgUrl = $activity->first('img')->attr('src');
            $tmp = explode('/', $imgUrl);
            $imgName = end($tmp);

            if($disk->missing($imgName)){
                $imgData = $this->parse($imgUrl);
                $disk->put($imgName, $imgData);
            }

            try { 
                $ocr = new TesseractOCR($disk->path($imgName));

                $ocrText = $ocr->lang('ukr')->run();
            } catch (UnsuccessfulCommandException $e) {
                $ocrText = 'none';
            }
            
            return ['text' => $ocrText];
        }

        return ['text' => $activity->text()];
    }
}
