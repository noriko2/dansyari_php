<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->get('/');

        $response->assertStatus(200)
            ->assertViewIs('home.index');
    }

    public function testQuestion()
    {
        // questionページ(アイテム：服)にアクセス
        $response = $this->get('/question/?id=0&amp;question_number=0');

        $response->assertStatus(200)
            ->assertViewIs('home.question')
            ->assertSee('毛玉、穴あき、シミがある？');
    }
}
