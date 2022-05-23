<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Post;
use App\PostsCategory;
use Faker\Generator as Faker;

$factory->define(PostsCategory::class, function ($faker) use ($factory) {
    return [
    'category_id' => $faker->numberBetween(1,4), // there are 4 post categories in seeds
    'post_id' => factory(Post::class)->create()->id
    ];
});
