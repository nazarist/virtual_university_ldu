<?php

namespace App\Parser\Contracts;



interface ParserContract
{
	protected string $page;

	protected function document(): Document;

	public function getPage(): string;
}