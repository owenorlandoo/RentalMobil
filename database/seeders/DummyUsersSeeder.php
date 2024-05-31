<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
