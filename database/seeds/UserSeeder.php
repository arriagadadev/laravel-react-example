<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin Default ',
            'user_type_id' => 1, //Admin user type id
            'email' => 'admin@admin.cl',
            'password' => Hash::make('admin')
        ]);
        User::create([
            'name' => 'User Default',
            'user_type_id' => 2, //User type id
            'email' => 'user@user.cl',
            'password' => Hash::make('user')
        ]);
        User::create([
            'name' => 'User2 Default',
            'user_type_id' => 2, //User type id
            'email' => 'user2@user.cl',
            'password' => Hash::make('user')
        ]);
        User::create([
            'name' => 'User3 Default',
            'user_type_id' => 2, //User type id
            'email' => 'user3@user.cl',
            'password' => Hash::make('user')
        ]);
        User::create([
            'name' => 'User4 Default',
            'user_type_id' => 2, //User type id
            'email' => 'user4@user.cl',
            'password' => Hash::make('user')
        ]);
    }
}
