<?php

use Backend\Models\User;
use Renatio\Todos\Models\Task;
use Renatio\Todos\Models\TodoList;

/*
 * User
 */
$factory->define(User::class, function ($faker) {
    return [
        'email' => $faker->email,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'login' => $faker->email,
        'password' => $password = $faker->password,
        'password_confirmation' => $password,
    ];
});

/*
 * TodoList
 */
$factory->define(TodoList::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence,
        'user_id' => factory(User::class)->create(),
    ];
});

/*
 * Task
 */
$factory->define(Task::class, function (Faker\Generator $faker) {
    return [
        'list_id' => factory(TodoList::class)->create(),
        'name' => $faker->sentence,
        'reminder_at' => $faker->dateTime(),
        'priority' => $faker->randomElement([1, 2, 3, 4, 5]),
    ];
});