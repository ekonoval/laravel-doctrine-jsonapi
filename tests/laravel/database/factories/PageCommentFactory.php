<?php

/** @var LaravelDoctrine\ORM\Testing\Factory $factory */

use Tests\App\Entities\User;
use Tests\App\Entities\Page;
use Tests\App\Entities\PageComment;
use Faker\Generator;

$factory->define(PageComment::class, function (Generator $faker, array $attributes) use ($factory) {
    $page = $attributes['page'] ?? $factory->create(Page::class);
    $user = $attributes['user'] ?? $factory->create(User::class);

    return [
        'id' => $attributes['id'] ?? $faker->unique()->uuid,
        'user' => $user,
        'page' => $page,
        'content' => $attributes['content'] ?? join("\n", $faker->paragraphs(1)),
    ];
});
