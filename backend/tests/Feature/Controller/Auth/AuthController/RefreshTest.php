<?php

namespace Tests\Feature\Controller\Auth\AuthController;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tests\Trait\User\CreateUserTrait;

class RefreshTest extends TestCase
{
    use DatabaseMigrations,
        CreateUserTrait;
    public function testSucesfulyRefreshToken(): void
    {
        $formData = $this->createUserGetFormData();
        $token = auth()->attempt($formData);

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->postJson(route('auth.refresh'));

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'token',
                'token_type',
                'expires_in'
            ]);

        $this->assertAuthenticated();
    }


    public function testFailedRefreshTokenDueToUnauthenticated()
    {
        $response = $this->postJson(route('auth.refresh'));

        $response
            ->assertStatus(401)
            ->assertJson(['message' => 'Unauthenticated.']);

        $this->assertGuest();
    }
}
