<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            "name" => "admin",
            "email" => "test@test.com",
            "password" => bcrypt("test"),
            "isAdmin" => true
        ]);

        $user = User::create([
            "name" => "user",
            "email" => "user@test.com",
            "password" => bcrypt("test")
        ]);
    }
}
