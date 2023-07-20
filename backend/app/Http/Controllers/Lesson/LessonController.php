<?php

namespace App\Http\Controllers\Lesson;

use App\Http\Controllers\Controller;

use App\Parser\LduUniversity;
use DiDom\Document;
use DiDom\Exceptions\InvalidSelectorException;
use Hamcrest\Thingy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class LessonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
//        $profile = auth()->user()->profile;
//
//
//        $response = Http::asForm()
//            ->contentType('application/x-www-form-urlencoded')
//            ->post('http://virt.ldubgd.edu.ua/login/index.php', [
//                'username' => $profile->ldu_login,
//                'password' => $profile->ldu_password
//            ]);
//
//        $moodleSession = $response->cookies()->getCookieByName('MoodleSession');
//
//        Cache::put('moodleSession', [
//            'value' => $moodleSession->getValue(),
//            'domain' => $moodleSession->getDomain()
//        ]);

//

//        Session::put([
//            'nazar' => 'dwedwedw'
//        ]);

//        return $moodleSession;
//        Storage::disk('local')->put('page.html', $response);

//        $page =  Storage::disk('local')->get('page.html');
//
//
//        $document = new Document($page);
//
//        $courseboxs = $document->find('.coursebox');
//
//        $data = [];
//        foreach ($courseboxs as $coursebox){
//            $courseName = $coursebox->first('.coursename');
//
//            $data[$courseName->text()] = [
//                    'link' =>$courseName->first('a')->attr('href')
//                ];
//        }
//        Storage::disk('local')->put('lesson.txt', json_encode($data));


//        $session = Cache::get('moodleSession');

//        $lesson = json_decode(Storage::disk('local')->get('lesson.txt'));
//

//        $response = Http::withCookies([
//            'MoodleSession' => $session['value']
//        ], $session['domain'])
//            ->get('http://virt.ldubgd.edu.ua/course/view.php?id=3076');
//
//        Storage::disk('local')->put('lessonPage.html', $response);

//
//        $lessonPage = Storage::disk('local')->get('lessonPage.html');
//
//        $document = new Document($lessonPage);
//
//        $contents = $document->find('.main .content');
//
//        $data = [];
//        foreach ($contents as $content){
//
//            $data[] = [
//                'title' => $content->first('.sectionname')->text()
//            ];
//        }
//
//        dd($data);






    }
}
