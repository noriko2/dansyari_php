<?php

namespace Tests;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function create_user()
    {
        $user = User::factory()->create();
        Post::factory()->create(['user_id' => $user->id]);
        return $user;
    }

    public function login($user)
    {
        $this->actingAs($user);
        return $user;
    }
}
