<?php

namespace Tests\Trait\User;

use App\Models\User;

trait CreateUserTrait
{
    public static User $user;
    public function createUserGetFormData(array $rewriteData = []): array
    {
        self::$user = User::factory()->create();

        return $this->getFormData($rewriteData);
    }

    public function makeUserGetFormData(array $rewriteData = []): array
    {
        self::$user = User::factory()->make();

        return $this->getFormData($rewriteData);
    }


    private function getFormData(array $data = []): array
    {
        return array_merge($data, [
            'name' => self::$user->name,
            'email' => self::$user->email,
            'password' => 'password',
        ]);
    }
}
