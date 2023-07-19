<?php

namespace Tests\Feature\Controller\Auth\AuthController;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tests\Trait\User\CreateUserTrait;

class LoginTest extends TestCase
{
    use DatabaseMigrations,
        CreateUserTrait;
    public function testSucesfulyLogin(): void
    {
        $response = $this->postJson(route('auth.login'), $this->createUserGetFormData());

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'token',
                'token_type',
                'expires_in'
            ]);
        $this->assertAuthenticated();
    }


    public function testLoginWithInvalidCredential()
    {
        $formData = $this->createUserGetFormData(['email' => 'invalid@gmail.com']);

        $formData['email'] = 'invalid';
        $response = $this->postJson(route('auth.register'), $formData);

        $response
            ->assertStatus(422)
            ->assertJsonValidationErrors(['email']);
        $this->assertGuest();
    }
}
