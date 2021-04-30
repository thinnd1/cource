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
            'login' => 'admin',
            'prenom' => 'Nguyen',
            'nom' => 'Thin',
            'active_flg' => 1,
            'mdp' => bcrypt('admin'),
            'type' => 'admin', //admin
        ]);

        DB::table('users')->insert([
            'login' => 'teacher1',
            'prenom' => 'Nguyen',
            'nom' => 'Thin',
            'active_flg' => 1,
            'mdp' => bcrypt('12345678'),
            'type' => 'enseignant', // lecture
        ]);

        DB::table('users')->insert([
            'id' => 3,
            'login' => 'teacher2',
            'prenom' => 'Nguyen',
            'nom' => 'Thin',
            'active_flg' => 1,
            'mdp' => bcrypt('12345678'),
            'type' => 'enseignant', // lecture
        ]);

       DB::table('users')->insert([
            'login' => 'student',
            'prenom' => 'Nguyen',
            'nom' => 'Thin',
            'active_flg' => 1,
            'mdp' => bcrypt('12345678'),
            'type' => 'etudiant', //student
        ]);
    }
}
