<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
               'f_name'=>'User',
               'l_name'=>'User',
               'email'=>'user@adorepal.com',
               'role'=> 0,
               'password'=> bcrypt('useradorepal8877'),
            ],
            [
               'f_name'=>'Editor',
               'l_name'=>'Editor',
               'email'=>'editor@adorepal.com',
               'role'=> 1,
               'password'=> bcrypt('editoradorepal8877'),
            ],
            [
               'f_name'=>'Admin',
               'l_name'=>'Admin',
               'email'=>'admin@adorepal.com',
               'role'=> 2,
               'password'=> bcrypt('hassan@adorepal5454'),
            ],
            [
                'f_name'=>'Customer',
                'l_name'=>'Customer',
                'email'=>'customer@adorepal.com',
                'role'=> 3,
                'password'=> bcrypt('customeradorepal8877'),
             ],

        ];

        foreach ($users as $key => $user)
        {
            User::create($user);
        }
    }
}

