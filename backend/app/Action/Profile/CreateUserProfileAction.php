<?php


namespace App\Action\Profile;

use App\Parser\LduScraper\MainPage;
use App\Models\UserProfile;


class CreateUserProfileAction
{
	public function __invoke(array $credentials)
	{
		$profile = UserProfile::query()->create($credentials);
		$mainPage = new MainPage($profile);

		$fullName = $mainPage->parseProfileFullName();
		
		$profile->fill($fullName)->save();
		return $profile;
	}
}