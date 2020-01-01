<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id'=>null,
            'name'=>'Switch',
            'assets_id'=>'1'
        ]);

        DB::table('categories')->insert([
            'id'=>null,
            'name'=>'All In One',
            'assets_id'=>'1'
        ]);

        DB::table('categories')->insert([
            'id'=>null,
            'name'=>'Router',
            'assets_id'=>'1'
        ]);

        DB::table('categories')->insert([
            'id'=>null,
            'name'=>'Desktop',
            'assets_id'=>'1'
        ]);

        DB::table('categories')->insert([
            'id'=>null,
            'name'=>'Notebook',
            'assets_id'=>'1'
        ]);

        DB::table('categories')->insert([
            'id'=>null,
            'name'=>'Monitor',
            'assets_id'=>'1'
        ]);

        DB::table('categories')->insert([
            'id'=>null,
            'name'=>'Television',
            'assets_id'=>'1'
        ]);

        DB::table('categories')->insert([
            'id'=>null,
            'name'=>'Servidor',
            'assets_id'=>'1'
        ]);

        DB::table('categories')->insert([
            'id'=>null,
            'name'=>'Disco Duro',
            'assets_id'=>'1'
        ]);

        DB::table('categories')->insert([
            'id'=>null,
            'name'=>'Memoria Ram',
            'assets_id'=>'1'
        ]);

        DB::table('categories')->insert([
            'id'=>null,
            'name'=>'Procesador',
            'assets_id'=>'1'
        ]);

        DB::table('categories')->insert([
            'id'=>null,
            'name'=>'Placa Madre',
            'assets_id'=>'1'
        ]);

        DB::table('categories')->insert([
            'id'=>null,
            'name'=>'Impresora',
            'assets_id'=>'1'
        ]);
    }
}
