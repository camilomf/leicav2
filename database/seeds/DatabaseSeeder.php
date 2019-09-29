<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'id'=>null,
            'key'=>'Admin',
            'name'=>'Administrador de usuarios'
        ]);

        DB::table('roles')->insert([
            'id'=>null,
            'key'=>'Chief',
            'name'=>'Director de carrera'
        ]);

        DB::table('roles')->insert([
            'id'=>null,
            'key'=>'Usuario',
            'name'=>'Usuario'
        ]);

        DB::table('users')->insert([
            'id'=>null,
            'name'=>'admin',
            'email'=>'admin@mail.com',
            'password'=> bcrypt('secret123'),
            'role_id'=>1
        ]);

        DB::table('users')->insert([
            'id'=>null,
            'name'=>'user',
            'email'=>'user@mail.com',
            'password'=> bcrypt('secret123'),
            'role_id'=>3
        ]);

        DB::table('users')->insert([
            'id'=>null,
            'name'=>'chief',
            'email'=>'chief@mail.com',
            'password'=> bcrypt('secret123'),
            'role_id'=>2
        ]);

        // $this->call(UsersTableSeeder::class);
    }
}
