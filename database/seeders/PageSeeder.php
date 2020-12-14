<?php

namespace Database\Seeders;

use App\Models\Page;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pageTitles = ['About','Policy'];
        $faker = Factory::create();
        $order = 0;

        foreach ($pageTitles as $title){
            $order++;
            Page::insert([
                'title'=>$title,
                'content'=>$faker->realText(),
                'order'=>$order,
                'slug'=>Str::slug($title),
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
    }
    }
}
