<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function (){
    dd(2);
});

Route::get('/http', function (){

    $response = Http::post('http://virt.ldubgd.edu.ua/login/index.php', [
        'username' => 'nazar',
        'password' => 'password'
    ])->status();

    return $response;
});

