<?php

use Illuminate\Database\Seeder;

class SecretariaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('secretarias')->insert([
            'titulo' => 'Secretaria Municipal de Educacao',
            'sigla' => 'PMJ/SME',
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('secretarias')->insert([
            'titulo' => 'Secretaria Municipal de Administracao',
            'sigla' => 'PMJ/SMA',
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('secretarias')->insert([
            'titulo' => 'Secretaria Municipal de Desenvolvimento Social',
            'sigla' => 'PMJ/SMDS',
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('secretarias')->insert([
            'titulo' => 'Procuradoria Geral do Município',
            'sigla' => 'PMJ/PGM',
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('secretarias')->insert([
            'titulo' => 'Secretaria Municipal da Fazenda',
            'sigla' => 'PMJ/SMF',
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('secretarias')->insert([
            'titulo' => 'Secretaria Municipal de Governo',
            'sigla' => 'PJM/SMG',
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('secretarias')->insert([
            'titulo' => 'Secretaria Municipal de Infraestrutura',
            'sigla' => 'PJM/SMI',
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('secretarias')->insert([
            'titulo' => 'Secretaria Municipal de de Agricultura, Irrigacao e Meio Ambiente',
            'sigla' => 'PJM/SMAIMA',
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('secretarias')->insert([
            'titulo' => 'Secretaria Municipal de Cultura e Turismo',
            'sigla' => 'PJM/SMCT',
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('secretarias')->insert([
            'titulo' => 'Secretaria Municipal de Esporte e Lazer',
            'sigla' => 'PJM/SMEL',
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('secretarias')->insert([
            'titulo' => 'Secretaria Municipal de Desenvolvimento Economico',
            'sigla' => 'PJM/SMDE',
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('secretarias')->insert([
            'titulo' => 'Controladoria Geral do Município',
            'sigla' => 'PJM/CGM',
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('secretarias')->insert([
            'titulo' => 'Secretaria Municipal de Servicos Publicos',
            'sigla' => 'PJM/SMSP',
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('secretarias')->insert([
            'titulo' => 'Secretaria de Relacoes Institucionais e Comunicacao Social',
            'sigla' => 'PJM/SRICS',
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('secretarias')->insert([
            'titulo' => 'Servico de Informacao ao Cidadao',
            'sigla' => 'PJM/SIC',
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('secretarias')->insert([
            'titulo' => 'Protocolo',
            'sigla' => 'PJM/Protocolo',
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
