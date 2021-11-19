<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class jetstreamControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @return void */
    function testDashboard()
    {
        $user1 = $this->create_user();
        $gest = $this->create_user();

        $count = $user1->posts->count();

        $this->login($user1);

        $this->get('/dashboard')
            ->assertStatus(200)
            ->assertViewIs('dashboard')
            ->assertSee($user1->name)
            ->assertSee("断捨離数： {$count}点")
            ->assertDontSee($gest->name);
    }
}
