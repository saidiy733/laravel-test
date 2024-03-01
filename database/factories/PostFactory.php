<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use function Laravel\Prompts\text;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    //  protected $model = Post::class;

    public function definition(): array
    {
        return [
            //

            'title' => fake()->realText($maxNbChars=100,$indexSize=2),
            'slug' => Str::slug(fake()->realText($maxNbChars=100,$indexSize=2)),
            'body' => fake()->text(),
            'image' => fake()->imageUrl(640,480),
        ];
    }
    
}
