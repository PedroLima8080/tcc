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

        DB::table('library')->insert([
            'nome' => 'Unesp',
            'cnpj' => '48.031.918/0004-77',
            'email' => 'unesp@unesp.br',
            'fone' => '(14) 99904-0646',
            'bairro' => 'Vargem Limpa',
            'endereco' => 'Av. Eng. Luís Edmundo Carrijo Coube',
            'numero' => '14-01',
            'cidade' => 'Bauru',
            'password' => md5('123coxinha'),
            'uf' => 'SP',
            'cep' => '17033-360',
            'valida' => 1
        ]);
    }
}
