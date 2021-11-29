<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $image1_path = '/images/test_posts/cloth_1.png';
        $image2_path = '/images/test_posts/cloth_2.png';
        return [
            'caption' => $this->faker->realText(200),
            // 2つの画像をランダムに挿入
            'post_image' => $this->faker->randomElement([$image1_path, $image2_path]),
            // 画像が１つの場合は、'post_image' => $image1_path, でOK
            'created_at' => $this->faker->dateTimeBetween('-10days', '0days')
        ];
    }
}
