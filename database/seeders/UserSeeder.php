<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('i23'),
                'level' => 'admin',
            ],

            [
                'name' => 'kasir',
                'email' => 'kasir@gmail.com',
                'password' => bcrypt('i23'),
                'level' => 'kasir',
            ],

            [
                'name' => 'manager',
                'email' => 'manager@gmail.com',
                'password' => bcrypt('i23'),
                'level' => 'manager',
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
