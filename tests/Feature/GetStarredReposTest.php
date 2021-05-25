<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class GetStarredReposTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_starred_repos()
    {
        $user = factory(User::class)->create([
            'github_token' => env('GITHUB_TOKEN')
        ]);

        $repos = $this->actingAs($user)
            ->post('/repos')
            ->assertOk();
    }
}
