<?php

namespace App\Parser\LduScraper;

use App\Models\UserProfile;
use App\Parser\LduUniversity;
use DiDom\Document;
use Illuminate\Support\Facades\Storage;
use App\Parser\Contracts\ParserContract;
use thiagoalessio\TesseractOCR\TesseractOCR;
use DiDom\Element;

class CoursePage extends LduUniversity 
{
    protected string $pageLink;

    public function __construct(int $linkId)
    {
        parent::__construct(auth()->user()->profile);

        $this->pageLink = 'http://virt.ldubgd.edu.ua/course/view.php?id='.$linkId;


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



    public function getLesson()
    {
        $contents = $this->document()->find('.main');// sections


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


    protected function contentAfterLink(Element $activity)
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

            $ocr = new TesseractOCR($disk->path($imgName));

            $ocrText = $ocr->lang('ukr')->run();
            
            return ['text' => $ocrText];
        }

        return ['text' => $activity->text()];
    }
}
