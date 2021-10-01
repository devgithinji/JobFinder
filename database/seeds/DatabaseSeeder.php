<?php

use App\Category;
use App\Profile;
use App\User;
use App\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        factory('App\User', 20)->create();
        factory('App\Company', 30)->create();
        factory(\App\Post::class, 20)->create();
        factory(\App\Testimonial::class, 10)->create();

        $users = User::all();

        foreach ($users as $user) {
            Profile::create([
                'user_id' => $user->id
            ]);
        }

        $categories = [
            'Technology',
            'Engineering',
            'Government',
            'Medical',
            'Construction',
            'Software',
            'Banking',
            'Insurance'
        ];

        Role::truncate();
        foreach ($categories as $category) {
            Category::create([
                'name' => $category
            ]);
        }

        factory('App\Job', 50)->create();

        $adminRole = Role::create(['name' => 'admin']);
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password123'),
            'email_verified_at' => NOW()
        ]);

        $admin->roles()->attach($adminRole);


    }
}
