<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'    => 'admin',
            'email'    => 'admin@test.com',
            'password'   =>  bcrypt('123456'),
            // 'remember_token' =>  str_random(10),
            'permission'   =>  1,
        ]);
    }
}
