<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Company;
use App\Models\Job;
use App\Models\Location;
use Faker\Generator as Faker;

$factory->define(Job::class, function (Faker $faker) {
    return [
        'title' => $faker->jobTitle,
        'slug' => $faker->slug,
        'company_id' => factory(Company::class)->create()->id,
        'type' => $faker->randomElement(['full time', 'part time', 'full time/part time']),
        'is_remote' => $faker->boolean,
        'location_id' => factory(Location::class)->create()->id,
        'contact_person' => $faker->name,
        'contact_person_email' => $faker->email,
        'apply_url' => $faker->url,
        'salary' => $faker->randomNumber,
        'description' => $faker->text,
        'published_at' => now(),

    ];
});
