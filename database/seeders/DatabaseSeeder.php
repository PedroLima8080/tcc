<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nome' => 'Administrador',
            'email' => 'neptuno@gmail.com',
            'data_nasc' => '2003/07/11',
            'genero' => 'masculino',
            'adm' => 1,
            'password' => md5('123coxinha'),
        ]);
    }
}
