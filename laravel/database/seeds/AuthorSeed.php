<?php

use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeed extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 5; $i < 10; $i++) {
            Author::create([
                'name' => $faker->firstNameMale,
                'avatar' => 'https://picsum.photos/150/'. rand(101, 150),
                'introduction' => $faker->sentence,
                'number' => ($i + 1)
            ]);
        }
    }
}
