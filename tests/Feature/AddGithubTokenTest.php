<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class AddGithubTokenTest extends TestCase
{
    use RefreshDatabase;

    public function test_add_token()
    {
        $user = factory(User::class)->create();
        $token = Str::uuid();

        $this->actingAs($user)
            ->post('/token', ['token' => $token])
            ->assertOk();

        /*$this->assertDatabaseHas('users', [
            'email' => $user->email,
            'name' => $user->name,
            'pasword' => $user->password,
            'github_token' => $token,
        ]);*/
    }
}
