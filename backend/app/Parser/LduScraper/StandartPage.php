<?php

namespace App\Parser\LduScraper;

use App\Parser\LduUniversity;


class StandartPage extends LduUniversity 
{
    public function __construct()
    {
        parent::__construct(auth()->user()->profile);
    }

}
