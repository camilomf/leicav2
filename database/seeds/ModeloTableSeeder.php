<?php

use Illuminate\Database\Seeder;

class ModeloTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modelos')->insert([
            'id'=>null,
            'name'=>'Envy',
            'trademark_id'=>2
        ]);

        DB::table('modelos')->insert([
            'id'=>null,
            'name'=>'Pavilion',
            'trademark_id'=>2
        ]);

        DB::table('modelos')->insert([
            'id'=>null,
            'name'=>'Omen',
            'trademark_id'=>2
        ]);

        DB::table('modelos')->insert([
            'id'=>null,
            'name'=>'ROG',
            'trademark_id'=>3
        ]);

        DB::table('modelos')->insert([
            'id'=>null,
            'name'=>'TUG',
            'trademark_id'=>3
        ]);

        DB::table('modelos')->insert([
            'id'=>null,
            'name'=>'Thinkpad',
            'trademark_id'=>4
        ]);

        DB::table('modelos')->insert([
            'id'=>null,
            'name'=>'Thinkvision',
            'trademark_id'=>4
        ]);

        DB::table('modelos')->insert([
            'id'=>null,
            'name'=>'VA',
            'trademark_id'=>5
        ]);

        DB::table('modelos')->insert([
            'id'=>null,
            'name'=>'VX',
            'trademark_id'=>5
        ]);

        DB::table('modelos')->insert([
            'id'=>null,
            'name'=>'i7 6700',
            'trademark_id'=>6
        ]);

        DB::table('modelos')->insert([
            'id'=>null,
            'name'=>'i5 8500',
            'trademark_id'=>6
        ]);

        DB::table('modelos')->insert([
            'id'=>null,
            'name'=>'Ryzen 3',
            'trademark_id'=>7
        ]);

        DB::table('modelos')->insert([
            'id'=>null,
            'name'=>'Ryzen 5',
            'trademark_id'=>7
        ]);

        DB::table('modelos')->insert([
            'id'=>null,
            'name'=>'C24',
            'trademark_id'=>8
        ]);

        DB::table('modelos')->insert([
            'id'=>null,
            'name'=>'NP27',
            'trademark_id'=>8
        ]);

        DB::table('modelos')->insert([
            'id'=>null,
            'name'=>'Leopard',
            'trademark_id'=>9
        ]);

        DB::table('modelos')->insert([
            'id'=>null,
            'name'=>'Scorpio',
            'trademark_id'=>10
        ]);

        DB::table('modelos')->insert([
            'id'=>null,
            'name'=>'P300',
            'trademark_id'=>11
        ]);

        DB::table('modelos')->insert([
            'id'=>null,
            'name'=>'KCP424',
            'trademark_id'=>12
        ]);

        DB::table('modelos')->insert([
            'id'=>null,
            'name'=>'CT4G4',
            'trademark_id'=>13
        ]);

        DB::table('modelos')->insert([
            'id'=>null,
            'name'=>'AD4U',
            'trademark_id'=>14
        ]);

        DB::table('modelos')->insert([
            'id'=>null,
            'name'=>'GA-A320',
            'trademark_id'=>15
        ]);

        DB::table('modelos')->insert([
            'id'=>null,
            'name'=>'Inspirion',
            'trademark_id'=>16
        ]);

        DB::table('modelos')->insert([
            'id'=>null,
            'name'=>'Optiplex',
            'trademark_id'=>16
        ]);

        DB::table('modelos')->insert([
            'id'=>null,
            'name'=>'PIXMA',
            'trademark_id'=>17
        ]);

        DB::table('modelos')->insert([
            'id'=>null,
            'name'=>'MFC',
            'trademark_id'=>18
        ]);
    }
}
