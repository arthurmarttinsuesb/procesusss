<?php

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
            'nome' => 'Administrador',
            'slug' => 'administrador',
            'tipo' => 'PF',
            'sexo' => 'Masculino',
            'nascimento' => '2020-12-05',
            'telefone' => '(99) 99999-9999',
            'cpf_cnpj' => '000001',
            'logradouro' => 'Logradouro Teste',
            'numero' => '0',
            'bairro' => 'São Judas',
            'cep' => '45200-000',
            'complemento' => 'complemento',
            'fk_cidade' => '3387',
            'fk_estado' => '5',
            'email' => 'admin@processus.com.br',
            'password' => Hash::make('processus@234'),
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('user_setors')->insert([
            'fk_user' => '1',
            'fk_setor' => '1',
            'data_entrada' => now(),
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
    }
}
