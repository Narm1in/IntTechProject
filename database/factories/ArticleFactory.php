<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Psy\Util\Str;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence;
        $slug = \Illuminate\Support\Str::slug($title);
        return [
            'title'=>$title,
            'category_id'=>$this->faker->numberBetween(1,6),
            'description'=>$this->faker->paragraph,
            'content'=>$this->faker->realText(4000),
            'author'=>$this->faker->name,
            'slug'=>$slug,
        ];
    }
}
