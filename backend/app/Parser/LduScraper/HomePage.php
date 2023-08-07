<?php

namespace App\Parser\LduScraper;

use App\Models\UserProfile;
use App\Parser\LduUniversity;
use DiDom\Document;
use Illuminate\Support\Facades\Storage;
use App\Parser\Contracts\ParserContract;


class HomePage extends LduUniversity 
{
    protected string $pageLink = 'http://virt.ldubgd.edu.ua/';

    public function __construct($profile = false)
    {
        parent::__construct($profile ?? auth()->user()->profile);
        
        if (Storage::disk('local')->exists('main.html')){
            $this->pageContent = Storage::disk('local')->get('main.html');
        }else{
            $this->pageContent = $this->parse($this->pageLink);
            Storage::disk('local')->put('main.html', $this->pageContent);
        }
    }


    public function parseCourses(): array
    {
        $courseboxses = $this->document()->find('.coursebox');

        $data = [];
        foreach ($courseboxses as $coursebox){
            $data[] = [
                'name' => $coursebox->first('.coursename')->text(),// get name
                'link_index' => $this->getLinkIndex($coursebox),
                'group_id' => $this->profile->group_id
            ];
        }
        
        return $data;
    }



    public function parseAndSaveCourses()
    {
        $courses = $this->parseCourses();
        
        
    }


    public function parseProfileFullName(): array
    {
        $fullName = $this->document()->first('.fullname')->text();

        [$lName, $fName] = explode(' ', $fullName);

        return [
            'l_name' => $lName,
            'f_name' => $fName
        ];
    }
}
