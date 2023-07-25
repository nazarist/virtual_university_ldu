<?php

namespace App\Parser\LduScraper;

use App\Models\UserProfile;
use App\Parser\LduUniversity;
use DiDom\Document;
use Illuminate\Support\Facades\Storage;
use App\Parser\Contracts\ParserContract;

class CoursePage extends LduUniversity 
{
    protected string $pageLink;

    public function __construct(UserProfile $profile, int $linkId)
    {
        parent::__construct($profile);

        $this->pageLink = 'http://virt.ldubgd.edu.ua/course/view.php?id='.$linkId;

        $this->loginInIfNotLoggedIn();

        $fileName = explode('?', $pageLink)[1] . '.html';

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
            $title = $content->first('.sectionname > span');

            $typeMaping = ['url','quiz','resource','folder'];
            
            $lesons = [];
            foreach($content->find('.activity') as $activities){

                foreach($typeMaping as $type){
                    if ($activities->has('.'.$type)) {
                        $lesons[] = [
                            'type' => $type,
                            'name' => $activities->first('.instancename')->firstChild()->text(),
                            'link' => $activities->first('a')->attr('href'),
                        ];
                        break;
                    }
                }
                
                if ($activities->has('.label')){
                    $lesons[] = [
                        'type' => 'lable',
                        'name' => $activities->text(),
                    ];
                }

            }


            $topic[] = [
                'title'  => $title->text(),
                'lesson' => $lesons,
            ];
        }

        dd($topic);
    }

}
