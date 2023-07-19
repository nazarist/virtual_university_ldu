<?php

namespace Tests\Feature\Controller\Auth\AuthController;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tests\Trait\User\CreateUserTrait;

class LogoutTest extends TestCase
{
    use DatabaseMigrations,
        CreateUserTrait;

    public function testSucesfulyLogout(): void
    {
        $formData = $this->createUserGetFormData();
        $token = auth()->attempt($formData);

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->postJson(route('auth.logout'));

        $response
            ->assertStatus(200)
            ->assertJson(['message' => 'Successfully logged out']);

        $this->assertGuest();
    }

    public function testFailedLogoutDueToUnauthenticated()
    {
        $response = $this->postJson(route('auth.logout'));

        $response
            ->assertStatus(401)
            ->assertJson(['message' => 'Unauthenticated.']);

        $this->assertGuest();
    }

}
