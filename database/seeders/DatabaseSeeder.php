<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::firstOrCreate([
            'email' => 'admin@123.com',
        ], [
            'name' => 'Admin',
            'password' => Hash::make('password'),
            'is_admin' => 1,
        ]);
    }

}
