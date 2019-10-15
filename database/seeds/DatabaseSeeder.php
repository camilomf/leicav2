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

        DB::table('states')->insert([
            'id'=>null,
            'name'=>'En mantencion',
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

        DB::table('trademarks')->insert([
            'id'=>null,
            'name'=>'marca no agregada',
        ]);

        DB::table('modelos')->insert([
            'id'=>null,
            'name'=>'modelo no agregado',
            'trademark_id'=>1
        ]);

        DB::table('places')->insert([
            'id'=>null,
            'name'=>'lugar no agregado',
            'description'=>'lugar 1'
        ]);

        DB::table('categories')->insert([
            'id'=>null,
            'name'=>'categoria no agregada',
            'assets_id'=>null
        ]);

        DB::table('maintenance_plans')->insert([
            'id'=>null,
            'name'=>'plan de mantencion no agregado',
            'description'=>null
        ]);

        DB::table('liabilities')->insert([
            'id'=>null,
            'name'=>'Alumno'
        ]);

        DB::table('liabilities')->insert([
            'id'=>null,
            'name'=>'Docente'
        ]);

        DB::table('liabilities')->insert([
            'id'=>null,
            'name'=>'Empleado INACAP'

        ]);

        DB::table('liabilities')->insert([
            'id'=>null,
            'name'=>'Otro'

        ]);

        // $this->call(UsersTableSeeder::class);
    }
}
