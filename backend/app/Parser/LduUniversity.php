<?php

namespace App\Parser;

use App\Models\UserProfile;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class LduUniversity
{
    protected string $mainPage = 'http://virt.ldubgd.edu.ua/';
    protected string $domain = 'virt.ldubgd.edu.ua';

    protected UserProfile $profile;

    public function __construct(UserProfile $profile)
    {
        $this->profile = $profile;
    }


    public function loginUser(): PromiseInterface|Response
    {
        $response = Http::asForm()
            ->contentType('application/x-www-form-urlencoded')
            ->post('http://virt.ldubgd.edu.ua/login/index.php', [
                'username' => $this->profile->ldu_login,
                'password' => $this->profile->ldu_password
            ]);

        $moodleSession = $response->cookies()->getCookieByName('MoodleSession');

        $this->profile->update([
            'moodle_session' => $moodleSession->getValue(),
        ]);

        return $response;
    }

    public function parsePage(string $link): PromiseInterface|Response
    {
        return Http::withCookies([
                'MoodleSession' => $this->profile->moodle_session
            ], $this->domain)->get($link);
    }
}
