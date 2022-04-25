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
                    'origin'=>'Publico en general',
                    'password'=>bcrypt('12345678'),
                ],
                [
                    'fname'=>'Anallely',
                    'lname'=>'Admin',
                    'email'=>'anallely.admin@gmail.com',
                    'role'=>'2',
                    'origin'=>'Publico en general',
                    'password'=>bcrypt('12345678'),
                ],
                [
                    'fname'=>'Anallely',
                    'lname'=>'Becaria',
                    'email'=>'anallely.becaria@gmail.com',
                    'origin'=>'Publico en general',
                    'role'=>'1',
                    'password'=>bcrypt('12345678'),
                ],
        ];

        User::insert($users);

    }
}
