<?php

namespace App\Parser\LduScraper;

use App\Models\UserProfile;
use App\Parser\LduUniversity;
use DiDom\Document;
use Illuminate\Support\Facades\Storage;
use App\Parser\Contracts\ParserContract;


class MainPage extends LduUniversity 
{
    protected string $pageLink = 'http://virt.ldubgd.edu.ua/';

    public function __construct(UserProfile $profile)
    {
        parent::__construct($profile);
        
        if (Storage::disk('local')->exists('main.html')){
            $this->pageContent = Storage::disk('local')->get('main.html');
        }else{
            $this->pageContent = $this->parsePage($this->pageLink);
            Storage::disk('local')->put('main.html', $this->pageContent);
        }
    }


    public function parseCourses(): array
    {
        $courseboxs = $this->document()->find('.coursebox');

        $data = [];
        foreach ($courseboxs as $coursebox){
            $data[] = [
                'name' => $coursebox->first('.coursename')->text(),// get name
                'link_index' => $this->getLinkIndex($courseboxs),
                'user_id' => $this->profile->user_id,
                'group_id' => $this->profile->group_id
            ];
        }
        
        return $data;
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
