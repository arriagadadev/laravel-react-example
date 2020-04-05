<?php

use Illuminate\Database\Seeder;
use App\UserType;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserType::create([
            'name' => 'Admin'
        ]);
        UserType::create([
            'name' => 'User'
        ]);
    }
}
