<?php

namespace App\Parser;

use App\Models\UserProfile;
use DiDom\Document;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

abstract class LduUniversity
{
    protected string $pageLink;

    protected string $pageContent;

    protected string $domain = 'virt.ldubgd.edu.ua';

    protected UserProfile $profile;

    public function __construct(UserProfile $profile)
    {
        $this->profile = $profile;
    }


    public function loginUser(): static
    {
        $response = Http::asForm()
            ->contentType('application/x-www-form-urlencoded')
            ->post('http://virt.ldubgd.edu.ua/login/index.php', [
                'username' => $this->profile->ldu_login,
                'password' => $this->profile->ldu_password
            ]);

        $moodleSession = $response->cookies()->getCookieByName('MoodleSession');

        dump($moodleSession->getValue());
        $this->profile->update([
            'moodle_session' => $moodleSession->getValue(),
            'session_at' => now()
        ]);

        return $this;
    }


    public function loginInIfNotLoggedIn(): static
    {
        $diff = now()->diffInSeconds($this->profile->session_at);
        if ($diff > 7200) {
             $this->loginUser();
        }
        return $this;
    }


    public function parsePage(string $link): PromiseInterface|Response
    {
        return Http::withCookies([
                'MoodleSession' => $this->profile->moodle_session
            ], $this->domain)->get($link);
    }


    public function getPage(): string
    {
        return $this->pageContent;
    }


    protected function document(): Document
    {
        return new Document($this->pageContent);
    }
}
