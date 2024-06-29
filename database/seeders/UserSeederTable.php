<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userdata=[
            [
                'name'=>'Ram',
                'email'=>'ram@gmail.com',
                'password'=>'1234',
                'gender'=>'male',
                'role'=>'admin'
            ],
            [
                'name'=>'Malika',
                'email'=>'malika@gmail.com',
                'password'=>'1234',
                'gender'=>'female',
                'role'=>'user'
            ]
        ];

        foreach($userdata as $user)
        {
            //check if email exists
            if(!User::where('email', $user['email'])->exists()){
                User::create($user);
            }
        }
    }
}
