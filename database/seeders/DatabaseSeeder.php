<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        //サンプルユーザーのデータを追加
        $sample_user = User::factory()->create([
            'name' => 'dansyari',
            'email' => 'dansyari@sample.com',
            'password' => Hash::make('password'),
        ]);

        $image_path = 'test_posts/shoes.jpeg';

        for ($num = 1; $num <= 100; $num++) {
            $sample_user->posts()->create([
                'caption' => "【 サンプル記録__{$num} 】 ナイキスニーカー。靴の中に穴があいていたため断捨離。",
                'post_image' => $image_path,
            ]);
        };

        //fakerでユーザーを2人作成し、ランダムで 1ユーザーあたり、2から5の投稿データを作成する
        User::factory(2)->create()->each(function ($user) {
            Post::factory(random_int(2, 5))->create(['user_id' => $user->id]);
        });
    }
}
