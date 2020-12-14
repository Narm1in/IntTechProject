<?php

namespace Database\Seeders;
use App\Models\Article;
use Database\Factories\ArticleFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create();
        $this->call(CategorySeeder::class);
        Article::factory(15)->create();
        $this->call(PageSeeder::class);
    }
}
