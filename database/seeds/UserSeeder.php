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
    }
}
