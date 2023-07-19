<?php

namespace Tests\Feature\Controller\Auth\AuthController;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tests\Trait\User\CreateUserTrait;

class RegisterTest extends TestCase
{
    use DatabaseMigrations,
        CreateUserTrait; # added methods for create or make user


    public function testSucesfulyRegistration(): void
    {
        $response = $this->postJson(route('auth.register'), $this->makeUserGetFormData());


        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'token',
                'token_type',
                'expires_in'
            ]);
        $this->assertAuthenticated();
    }

    public function testRegistrationWithInvalidCredential()
    {
        $formData = $this->makeUserGetFormData();
        unset($formData['name']);

        $response = $this->postJson(route('auth.register'), $formData);

        $response
            ->assertStatus(422)
            ->assertJsonValidationErrors(['name']);
        $this->assertGuest();
    }
}
