<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/nazar', function (){

    $response = Http::get('http://virt.ldubgd.edu.ua/');

    return $response;
});




