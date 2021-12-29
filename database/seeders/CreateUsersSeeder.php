<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class CreateUsersSeeder extends Seeder
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
                    'fname'=>'Anallely',
                    'lname'=>'Martínez',
                    'email'=>'anallely.proteco@gmail.com',
                    'role'=>'0',
                    'origin'=>'Comunidad UNAM',
                    'gender'=>'F',
                    'password'=>'12345678',
                    'aviso'=>'1',
                ],
                [
                    'fname'=>'Anallely',
                    'lname'=>'Admin',
                    'email'=>'anallely.admin@gmail.com',
                    'role'=>'1',
                    'origin'=>'Comunidad UNAM',
                    'gender'=>'F',
                    'password'=>'12345678',
                    'aviso'=>'1',
                ],
                [
                    'fname'=>'Anallely',
                    'lname'=>'Becaria',
                    'email'=>'anallely.becaria@gmail.com',
                    'role'=>'2',
                    'origin'=>'Comunidad UNAM',
                    'gender'=>'F',
                    'password'=>'12345678',
                    'aviso'=>'1',
                ],
        ];

        User::insert($users);

    }
}
