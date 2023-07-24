<?php

namespace App\Parser\LduScraper;

use App\Models\UserProfile;
use App\Parser\LduUniversity;
use DiDom\Document;
use Illuminate\Support\Facades\Storage;
use App\Parser\Contracts\ParserContract;

class MainPage extends LduUniversity implements ParserContract
{
    protected string $page;


    public function __construct(UserProfile $profile)
    {
        parent::__construct($profile);
        $this->loginInIfNotLoggedIn();

        if (Storage::disk('local')->exists('main.html')){
            $this->page = Storage::disk('local')->get('main.html');
        }else{
            $this->page = $this->parsePage($this->mainPageLink);
            Storage::disk('local')->put('main.html', $this->page);
        }
    }

    protected function document(): Document
    {
        return new Document($this->page);
    }

    public function getPage(): string
    {
        return $this->page;
    }


    public function parseCourses(): array
    {
        $courseboxs = $this->document()->find('.coursebox');

        $data = [];
        foreach ($courseboxs as $coursebox){
            $courseName = $coursebox->first('.coursename');

            $data[] = [
                'name' => $courseName->text(),
                'link' => $courseName->first('a')->attr('href')
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
