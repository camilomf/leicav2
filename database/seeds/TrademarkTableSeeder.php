<?php

use Illuminate\Database\Seeder;

class TrademarkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trademarks')->insert([
            'id'=>null,
            'name'=>'HP'
            //id2
        ]);

        DB::table('trademarks')->insert([
            'id'=>null,
            'name'=>'Asus'
            //id3
        ]);

        DB::table('trademarks')->insert([
            'id'=>null,
            'name'=>'Lenovo'
            //id4
        ]);

        DB::table('trademarks')->insert([
            'id'=>null,
            'name'=>'Viewsony'
            //id5
        ]);

        DB::table('trademarks')->insert([
            'id'=>null,
            'name'=>'Intel'
            //id6
        ]);

        DB::table('trademarks')->insert([
            'id'=>null,
            'name'=>'AMD'
            //id7
        ]);

        DB::table('trademarks')->insert([
            'id'=>null,
            'name'=>'Samsung'
            //id8
        ]);

        DB::table('trademarks')->insert([
            'id'=>null,
            'name'=>'MSI'
            //id9
        ]);

        DB::table('trademarks')->insert([
            'id'=>null,
            'name'=>'Western Digital'
            //id10
        ]);

        DB::table('trademarks')->insert([
            'id'=>null,
            'name'=>'Toshiba'
            //id11
        ]);

        DB::table('trademarks')->insert([
            'id'=>null,
            'name'=>'Kingston',
            //id12
        ]);

        DB::table('trademarks')->insert([
            'id'=>null,
            'name'=>'Crucial'
            //id13
        ]);

        DB::table('trademarks')->insert([
            'id'=>null,
            'name'=>'ADATA'
            //id14
        ]);

        DB::table('trademarks')->insert([
            'id'=>null,
            'name'=>'Gigabyte'
            //id15
        ]);

        DB::table('trademarks')->insert([
            'id'=>null,
            'name'=>'Dell'
            //id16
        ]);

        DB::table('trademarks')->insert([
            'id'=>null,
            'name'=>'Canon'
            //id17
        ]);

        DB::table('trademarks')->insert([
            'id'=>null,
            'name'=>'Brother'
            //id18
        ]);
    }
}
