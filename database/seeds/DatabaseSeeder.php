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
        \Illuminate\Support\Facades\DB::table('users')->insert([
             'name' => 'Dyego',
            'email' =>'cajero@email.com',
            'tipo_doc' =>'CEDULA DE CIUDADANIA',
            'numero_doc' =>'1085941918',
            'tipo_user' =>'1',
            'password' => bcrypt('12345678'),
        ]);
    }
}
