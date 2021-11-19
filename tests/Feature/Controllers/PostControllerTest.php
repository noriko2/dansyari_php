<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    // テスト用のDBをmigrationする。テストする度に実行され、テスト後データは削除される
    use RefreshDatabase;

    /** @test index */
    public function indexのhttpリクエストが成功する()
    {
        // テストデータを作成
        $user1 = $this->create_user();
        $gest = $this->create_user();

        $this->login($user1);   // $this->actingAs($user1);をしている

        $this->get(route('posts.index'))
            ->assertStatus(200)
            ->assertSee($user1->posts->first()->caption)
            ->assertDontSee($gest->posts->first()->caption);
    }

    public function testCreate()
    {
        $user1 = $this->create_user();

        $this->login($user1);

        $this->get(route('posts.create'))
            ->assertStatus(200)
            ->assertSee('断捨離を記録する');
    }
}
