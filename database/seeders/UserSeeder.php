<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'user_type' => '1',
            'password' => Hash::make('12345678'),
        ]);

        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'user_type' => '0',
            'password' => Hash::make('12345678'),
        ]);
    }
}
