<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'project_name' =>  'default',
        'status' => 1,
        'user_id' => App\User::all()->random()->id
    ];
});
