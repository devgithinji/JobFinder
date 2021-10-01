<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Testimonial;
use App\User;
use App\Company;
use App\Job;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

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

$factory->define(User::class, function (Faker $faker) {

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'user_type' => $faker->randomElement(['seeker', 'employer'], 1),
        'email_verified_at' => now(),
        'password' => bcrypt('secret'), // password
        'remember_token' => Str::random(10),
    ];
});


$factory->define(Company::class, function (Faker $faker) {
    return [
        'user_id' => User::where('user_type', 'employer')->get()->random()->id,
        'cname' => $name = $faker->company,
        'slug' => str_slug($name),
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'website' => $faker->domainName,
        'logo' => 'man.jpg',
        'cover_photo' => 'tumblr-image-sizes-banner.png',
        'slogan' => 'learn-earn and grow',
        'description' => $faker->paragraph(rand(2, 10)),
    ];
});


$factory->define(Testimonial::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'content' => $faker->paragraph(rand(1, 3)),
        'profession' => $faker->jobTitle,
        'video_id' => 'https://www.youtube.com/watch?v=uD7jQAT_mc0&t=4s',
    ];
});


$factory->define(\App\Post::class, function (Faker $faker) {
    return [
        'title' => $title = $faker->text(10),
        'slug' => Str::slug($title),
        'content' => $faker->paragraph(rand(2, 3)),
        'image' => $faker->imageUrl(400, 200, 'business'),
        'status' => 1,
    ];
});

$factory->define(Job::class, function (Faker $faker) {

    $salary = rand(10000, 50000);

    $id = User::where('user_type', 'employer')->get()->random()->id;

    dd(Company::where('user_id', $id)->first()->id);

    return [
        'user_id' => $id,
        'company_id' => Company::where('user_id', $id)->first()->id,
        'title' => $title = $faker->text,
        'slug' => str_slug($title),
        'description' => $faker->paragraph(rand(1, 3)),
        'roles' => $faker->paragraph(rand(1, 3)),
        'category_id' => Category::all()->random()->id,
        'position' => $faker->jobTitle,
        'address' => $faker->address,
        'type' => $faker->randomElement(['full-time', 'part-time', 'freelance']),
        'status' => rand(0, 1),
        'last_date' => $faker->dateTimeBetween('-1 week', '+2 months'),
        'number_of_vacancy' => rand(1, 10),
        'experience' => rand(1, 5),
        'gender' => $faker->randomElement(['any', 'male', 'female']),
        'salary' => round($salary, -3),
    ];
});
