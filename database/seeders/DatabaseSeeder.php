<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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

        for ($num = 1; $num <= 100; $num++) {
            $sample_user->posts()->create(['caption' => "【 サンプル記録__{$num} 】 ナイキスニーカー。靴の中に穴があいていたため断捨離。"]);
        };


        //fakerでユーザーを2人作成し、ランダムで、1ユーザーあたり、2から5の投稿データを作成する
        User::factory(2)->create()->each(function ($user) {
            Post::factory(random_int(2, 5))->create(['user_id' => $user->id]);
        });
    }
}
