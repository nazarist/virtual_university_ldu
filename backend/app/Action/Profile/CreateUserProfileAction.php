<?php


namespace App\Action\Profile;

use App\Parser\LduScraper\HomePage;
use App\Models\UserProfile;


class CreateUserProfileAction
{
	public function __invoke(array $credentials)
	{
		$profile = UserProfile::query()->create($credentials);
		$homePage = new HomePage($profile);

		$fullName = $homePage->parseProfileFullName();
		
		$profile->fill($fullName)->save();
		return $profile;
	}
}