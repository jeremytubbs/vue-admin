<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ///create admin role
        $group = App\Group::create([
            'name' => 'admin'
        ]);

        //create admin user
        $user = App\User::create([
            'name' => 'admin',
            'password' => \Hash::make('password'),
            'email'    => 'admin@admin.com'
        ]);

        //Create non admin user
        $user2 = App\User::create([
            'name' => 'user',
            'password' => \Hash::make('password'),
            'email'    => 'user@user.com'
        ]);

        //assign admin role to first user
        $user->assignGroup(1);

    }
}
