<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
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
            'name' => 'Leonardo',
            'email' => 'tattox26@hotmail.com',
            'password' =>  bcrypt('12345678'),
        ]);

        DB::table('users')->insert([
            'name' => 'usuario1',
            'email' => 'usuario1@gmail.com',
            'password' =>  bcrypt('12345678'),
        ]);

        DB::table('users')->insert([
            'name' => 'usuario2',
            'email' => 'usuario2@gmail.com',
            'password' =>  bcrypt('12345678'),
        ]);

        DB::table('users')->insert([
            'name' => 'usuario3',
            'email' => 'usuario3@gmail.com',
            'password' =>  bcrypt('12345678'),
        ]);

        DB::table('users')->insert([
            'name' => 'usuario4',
            'email' => 'usuario4@gmail.com',
            'password' =>  bcrypt('12345678'),
        ]);

        DB::table('users')->insert([
            'name' => 'usuario5',
            'email' => 'usuario5@gmail.com',
            'password' =>  bcrypt('12345678'),
        ]);
    }
}
