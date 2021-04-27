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
            'active_flg' => 1,
            'password' => bcrypt('admin'),
            'type' => 'admin', //admin
        ]);

        DB::table('users')->insert([
            'username' => 'teacher1',
            'first_name' => 'Nguyen',
            'last_name' => 'Thin',
            'active_flg' => 1,
            'password' => bcrypt('12345678'),
            'type' => 'enseignant', // lecture
        ]);

        DB::table('users')->insert([
            'id' => 3,
            'username' => 'teacher2',
            'first_name' => 'Nguyen',
            'last_name' => 'Thin',
            'active_flg' => 1,
            'password' => bcrypt('12345678'),
            'type' => 'enseignant', // lecture
        ]);

       DB::table('users')->insert([
            'username' => 'student',
            'first_name' => 'Nguyen',
            'last_name' => 'Thin',
            'active_flg' => 1,
            'password' => bcrypt('12345678'),
            'type' => 'etudiant', //student
        ]);
    }
}
