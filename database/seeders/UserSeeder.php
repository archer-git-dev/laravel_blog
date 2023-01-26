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
//        User::create([
//            'username' => 'archer',
//            'email' => 'archer@gmail.com',
//            'password' => Hash::make('archer2003'),
//            'role' => 'admin',
//        ]);

        User::create([
            'username' => 'bob',
            'email' => 'bob@gmail.com',
            'password' => Hash::make('bob228'),
        ]);
    }
}
