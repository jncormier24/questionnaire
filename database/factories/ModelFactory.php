<?php

use Faker\Generator as Faker;
use App\QuizCategory;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Quiz::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'quiz_category_id' => function () {
            return factory(\App\QuizCategory::class)->create()->id;
        }, //$table->unsignedInteger('quiz_category_id')->default(0);
        'updated_by_user_id' => function () {
            return factory(\App\User::class)->create()->id;
        } //$table->unsignedInteger('updated_by_user_id');
    ];
});

$factory->define(App\Question::class, function (Faker $faker) {
    return [
        'quiz_id' => function () {
            return factory(\App\Quiz::class)->create()->id;
        }, // $table->unsignedInteger('quiz_id')->default(0);
        'text' => $faker->sentence,// $table->text('text');
        'notes' => $faker->sentence,// $table->text('notes');
        'answer_type_id' => rand(0, 2),// $table->integer('answer_type_id');
        'updated_by_user_id' => function () {
            return factory(\App\User::class)->create()->id;
        }// $table->unsignedInteger('updated_by_user_id');
    ];
});

$factory->define(App\QuizCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->text,// $table->string('name');
        'updated_by_user_id' => function () {
            return factory(\App\User::class)->create()->id;
        }// $table->unsignedInteger('updated_by_user_id');
    ];
});