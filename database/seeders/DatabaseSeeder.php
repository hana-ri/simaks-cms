<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Article;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            "name" => "dimas",
            "username" => 'dimas',
            "email" => "dimas@gmail.com",
            "password" => bcrypt(ENV('seedPWD')),
            "is_admin" => true,
            "is_actived" => true
        ]);

        User::create([
            "name" => "rifty",
            "username" => 'rifty',
            "email" => "rifty@gmail.com",
            "password" => bcrypt(ENV('seedPWD')),
            "is_admin" => true,
            "is_actived" => true
        ]);

        User::create([
            "name" => "rizal",
            "username" => 'rizal',
            "email" => "rizal@gmail.com",
            "password" => bcrypt(ENV('seedPWD')),
            "is_admin" => true,
            "is_actived" => true
        ]);

    	Category::create([
    		"name" => "Web Programming",
    		"slug" => "web-programming",
    		"description" => "web programming Adipisicing anim ullamco cillum in ex minim laborum reprehenderit eu nisi excepteur."
    	]);

    	Category::create([
    		"name" => "Cyber Security",
    		"slug" => "cyber-security",
    		"description" => "cyber security Adipisicing anim ullamco cillum in ex minim laborum reprehenderit eu nisi excepteur."
    	]);

        User::factory(5)->create();

        // Article::factory(50)->create();

        Category::factory(5)->create();

/*

    	Article::create([
    		'user_id'=> 2,
    		'category_id'=> 2,
    		'title'=> 'four Child',
    		'slug' => 'four-child',
    		'excerpt' => 'lorem ipsum four childo',
    		'body' => '<p>Eiusmod dolor incididunt fugiat ea ad veniam fugiat dolore nisi tempor ut ut occaecat adipisicing ullamco dolore in culpa reprehenderit aliqua aliquip culpa laborum ullamco ut anim proident cillum amet non do lor quis dolor occaecat dolor et occaecat consectetur nisi cupidatat deserunt consequat in irure dolor reprehenderit eu cupidatat occaecat dolor aute exercitation dolor e deserunt ullamco ut in id consectetur pariatur eiusmod excepteur ut magna anim cillum nostrud commodo occaecat veniam reprehenderit ea minim culpa fugiat ex labore am et incididunt enim aliquip non ut ut in cupidatat dolore occaecat proident adipisicing tempor duis exercitation dolor in in nulla deserunt ullamco ea aliqua est in in a d in anim laborum irure veniam ullamco in sunt proident fugiat esse dolore non et dolor excepteur irure ut ad duis excepteur laborum cillum aute aliquip ad enim officia ut ut elit amet sit enim ad irure qui deserunt dolor ad eu enim laboris deserunt in esse ut cupidatat non aliquip cillum id laboris incididunt irure laboris aliqua do eiusmod ad ex duis proident magna nostrud consequat elit enim enim anim aliqua consectetur eiusmod ex laborum quis cillum deserunt irure.</p><p>Aliqua eu in consectetur sedvelit cillum exercitation sit enim dolore aliquip consequat adipisicing culpa irure ullamco duis tempor dolore enim.</p>'
    	]);

        */
    }
}
