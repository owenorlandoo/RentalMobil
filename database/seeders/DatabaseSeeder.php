<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $userData = [
            [
                'name'=>'Louis Setyandaru',
                'email'=>'louis@gmail.com',
                'role'=>'customer',
                'password'=>bcrypt('1')

            ],
            [
                'name'=>'Owen',
                'email'=>'owen@gmail.com',
                'role'=>'admin',
                'password'=>bcrypt('1')

            ],

            [
                'name'=>'Julius',
                'email'=>'julius@gmail.com',
                'role'=>'owner',
                'password'=>bcrypt('1')

            ]

        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}

