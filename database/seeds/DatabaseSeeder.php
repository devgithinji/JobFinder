<?php

use App\Category;
use App\Profile;
use App\User;
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
        factory('App\User',20)->create();
        factory('App\Company',20)->create();
        factory('App\Job',20)->create();

        $users = User::all();

        foreach ($users as $user){
            Profile::create([
                'user_id' =>$user->id
            ]);
        }

        $categories = [
            'Technology',
            'Engineering',
            'Government',
            'Medical',
            'Construction',
            'Software'
        ];

        foreach ($categories as $category){
            Category::create([
                'name'=> $category
            ]);
        }
    }
}
