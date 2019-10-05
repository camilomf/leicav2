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
            'key'=>'User',
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

        DB::table('states')->insert([
            'id'=>null,
            'name'=>'Operacional',
            'description'=>null
        ]);

        DB::table('states')->insert([
            'id'=>null,
            'name'=>'En Prestamo',
            'description'=>null
        ]);

        DB::table('states')->insert([
            'id'=>null,
            'name'=>'Falla tecnica',
            'description'=>null
        ]);

        DB::table('states')->insert([
            'id'=>null,
            'name'=>'Agotado',
            'description'=>null
        ]);

        DB::table('assets')->insert([
            'id'=>null,
            'name'=>'Fungible',
            'description'=>null
        ]);

        DB::table('assets')->insert([
            'id'=>null,
            'name'=>'No fungible',
            'description'=>null
        ]);

        // $this->call(UsersTableSeeder::class);
    }
}
