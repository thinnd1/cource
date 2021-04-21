<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'first_name' => 'Nguyen',
            'last_name' => 'Thin',
            'email' => 'admin@gmail.com',
            'active_flg' => 1,
            'password' => bcrypt('12345678'),
            'user_type' => 3, //admin
        ]);

        DB::table('users')->insert([
            'username' => 'teacher1',
            'first_name' => 'Nguyen',
            'last_name' => 'Thin',
            'email' => 'teacher1@email.com',
            'active_flg' => 1,
            'password' => bcrypt('12345678'),
            'user_type' => 2, // lecture
        ]);

        DB::table('users')->insert([
            'id' => 3,
            'username' => 'teacher2',
            'first_name' => 'Nguyen',
            'last_name' => 'Thin',
            'email' => 'teacher2@email.com',
            'active_flg' => 1,
            'password' => bcrypt('12345678'),
            'user_type' => 2, // lecture
        ]);

       DB::table('users')->insert([
            'username' => 'student',
            'first_name' => 'Nguyen',
            'last_name' => 'Thin',
            'email' => 'student@gmail.com',
            'active_flg' => 1,
            'password' => bcrypt('12345678'),
            'user_type' => 1, //student
        ]);
    }
}
