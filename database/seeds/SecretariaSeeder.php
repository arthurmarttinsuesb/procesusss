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
            'sigla' => 'Sec Educacao',          
            'status'=>'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('secretarias')->insert([            
            'titulo' => 'Secretaria Municipal de Administracao',
            'sigla' => 'Sec Administracao',          
            'status'=>'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('secretarias')->insert([            
            'titulo' => 'Secretaria Municipal de Desenvolvimento Social',
            'sigla' => 'Sec Desenvolvimento Social',          
            'status'=>'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('secretarias')->insert([            
            'titulo' => 'Procuradoria Geral do Município',
            'sigla' => 'Procuradoria Geral',          
            'status'=>'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('secretarias')->insert([            
            'titulo' => 'Secretaria Municipal da Fazenda',
            'sigla' => 'Sec Fazenda',          
            'status'=>'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('secretarias')->insert([            
            'titulo' => 'Secretaria Municipal de Governo',
            'sigla' => 'Sec Governo',          
            'status'=>'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('secretarias')->insert([            
            'titulo' => 'Secretaria Municipal de Infraestrutura',
            'sigla' => 'Sec Infraestrutura',          
            'status'=>'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('secretarias')->insert([            
            'titulo' => 'Secretaria Municipal de de Agricultura, Irrigacao e Meio Ambiente',
            'sigla' => 'Sec Agricultura e Meio ambiente',          
            'status'=>'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]); 

        DB::table('secretarias')->insert([            
            'titulo' => 'Secretaria Municipal de Cultura e Turismo',
            'sigla' => 'Sec Cultura e Turismo',          
            'status'=>'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]); 

        DB::table('secretarias')->insert([            
            'titulo' => 'Secretaria Municipal de Esporte e Lazer',
            'sigla' => 'Sec Esporte e Lazer',          
            'status'=>'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]); 

        DB::table('secretarias')->insert([            
            'titulo' => 'Secretaria Municipal de Desenvolvimento Economico',
            'sigla' => 'Sec Desenvolvimento Economico',          
            'status'=>'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]); 

        DB::table('secretarias')->insert([            
            'titulo' => 'Controladoria Geral do Município',
            'sigla' => 'Controladoria',          
            'status'=>'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]); 

        DB::table('secretarias')->insert([            
            'titulo' => 'Secretaria Municipal de Servicos Publicos',
            'sigla' => 'Sec Servicos Publicos',          
            'status'=>'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]); 

        DB::table('secretarias')->insert([            
            'titulo' => 'Secretaria de Relacoes Institucionais e Comunicacao Social',
            'sigla' => 'Sec Servicos Publicos',          
            'status'=>'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]); 

        DB::table('secretarias')->insert([            
            'titulo' => 'Servico de Informacao ao Cidadao',
            'sigla' => 'SIC',          
            'status'=>'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
