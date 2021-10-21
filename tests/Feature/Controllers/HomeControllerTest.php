<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    /** @test index */
    public function httpリクエストが成功する()
    {
        $this->get('/')
            ->assertStatus(200);
    }
}
