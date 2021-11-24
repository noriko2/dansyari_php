<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostControllerTest extends TestCase
{
    // テスト用のDBをmigrationする。テストする度に実行され、テスト後データは削除される
    use RefreshDatabase;

    /** @test index */
    public function TestIndex()
    {
        // テストデータを作成
        $user = $this->create_user();
        $other = $this->create_user();

        $this->login($user);   // $this->actingAs($user1);をしている

        $this->get(route('posts.index'))
            ->assertStatus(200)
            ->assertSee($user->posts->first()->caption)
            ->assertDontSee($other->posts->first()->caption);
    }

    public function testCreate()
    {
        $user1 = $this->create_user();

        $this->login($user1);

        $this->get(route('posts.create'))
            ->assertStatus(200)
            ->assertSee('断捨離を記録する');
    }

    /** @test destroy */
    public function 自分の投稿は削除できる()
    {
        $user = $this->create_user();
        $user_post = $user->posts->first();

        $this->login($user);

        $this->delete("posts/{$user_post->id}")
            ->assertRedirect('posts')
            ->assertSessionHas('flash_notice');

        // $user_post が削除されているか確認
        $this->assertDeleted($user_post)
            ->assertCount(0, Post::all());
    }

    /** @test destroy */
    public function 他人の投稿は削除できない()
    {
        $user = $this->create_user();
        $other = $this->create_user();
        $other_post = $other->posts->first();

        $this->login($user);

        $this->delete("posts/{$other_post->id}")
            ->assertRedirect('/');

        $this->assertCount(2, Post::all());
    }

    /** @test */
    function ゲストは投稿を閲覧、削除できない()
    {
        $url = '/login';

        $this->get('posts')->assertRedirect($url);
        $this->get('posts/create')->assertRedirect($url);
        $this->delete('posts/1')->assertRedirect($url);
    }
}
