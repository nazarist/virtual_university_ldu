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
        $this->loginInIfNotLoggedIn();

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
            $courseName = $coursebox->first('.coursename');

            $linkIndex = explode('id=', $courseName->first('a')->attr('href'))[1];
            $data[] = [
                'name' => $courseName->text(),
                'link_index' => $linkIndex
            ];
        }
        
        return $data;
    }


    public function parseProfileFullName(): array
    {

        $fullName = $this->document()->first('.fullname')->text();

        [$lName, $fName] = explode(' ', $fullName);

        return [
            'lName' => $lName,
            'fName' => $fName
        ];
    }
}
