	<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\PostCategory;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'title' => $faker->realText($maxNbChars = 100, $indexSize = 2),
        'body' => $faker->realText($maxNbChars = 2000, $indexSize = 2),
        'tags' => implode(";;", $faker->randomElements(['Politics', 'Zimbabwe', 'Mnangagwa', 'Chamisa', 'Human Rights', 'ZINASU', 'MDC', 'MDC Aliance', 'ZANU PF'], $faker->numberBetween(1,9))),
        'status' => $faker->numberBetween(0,1),
    ];
});
