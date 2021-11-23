<?php

use Illuminate\Database\Seeder;

class SetorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setors')->insert([
            'titulo' => 'Gabinete',
            'sigla' => 'PMJ/SME/Gabinete - Gabinete',
            'fk_secretaria' => 1,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Conselho de Alimentacao Escolar',
            'sigla' => 'PMJ/SME/CAE - Conselho de Alimentacao Escolar ',
            'fk_secretaria' => 1,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Conselho Municipal de Educacao',
            'sigla' => 'PMJ/SME/CME - Conselho Municipal de Educacao',
            'fk_secretaria' => 1,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Nucleo de Alimentacao Central das Escolas Municipais',
            'sigla' => 'PMJ/SME/NACEM - Nucleo de Alimentacao Central das Escolas Municipais',
            'fk_secretaria' => 1,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Departamento Pedagógico',
            'sigla' => 'PMJ/SME/DP - Departamento Pedagógico',
            'fk_secretaria' => 1,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Divisão de Alimentos Escolar',
            'sigla' => 'PMJ/SME/DAE - Divisão de Alimentos Escolar',
            'fk_secretaria' => 1,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Departamento de Projetos',
            'sigla' => 'PMJ/SME/DP - Departamento de Projetos',
            'fk_secretaria' => 1,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Departamento de Recursos Humanos',
            'sigla' => 'PMJ/SME/DRH - Departamento de Recursos Humanos',
            'fk_secretaria' => 1,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Regime Especial de Direito Administrativo',
            'sigla' => 'PMJ/SME/REDA - Regime Especial de Direito Administrativo',
            'fk_secretaria' => 1,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Anos Finais',
            'sigla' => 'PMJ/SME/AF - Anos Finais',
            'fk_secretaria' => 1,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Gabinete',
            'sigla' => 'PMJ/SMA/Gabinete - Gabinete',
            'fk_secretaria' => 2,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Departamento de Compras e Licitações',
            'sigla' => 'PMJ/SMA/DCL - Departamento de Compras e Licitações',
            'fk_secretaria' => 2,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Departamento De Recursos Humanos',
            'sigla' => 'PMJ/SMA/DRH - Departamento De Recursos Humanos',
            'fk_secretaria' => 2,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Departamento De Materiais e Patrimônio',
            'sigla' => 'PMJ/SMA/DEMAP - Departamento De Materiais e Patrimônio',
            'fk_secretaria' => 2,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Departamento Nacional de Infraestrutura de Transportes',
            'sigla' => 'PMJ/SMA/DENIT - Departamento Nacional de Infraestrutura de Transportes',
            'fk_secretaria' => 2,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Departamento De Informática',
            'sigla' => 'PMJ/SMA/DI - Departamento De Informática',
            'fk_secretaria' => 2,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Gabinete',
            'sigla' => 'PMJ/SMDS/Gabinete - Gabinete',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Sistema Unico de Assistencia Social',
            'sigla' => 'PMJ/SMDS/SUAS - Sistema Unico de Assistencia Social',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Sistema Unico de Assistencia Social',
            'sigla' => 'SUAS',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Restaurante Popular',
            'sigla' => 'PMJ/SMDS/RP - Restaurante Popular',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Programa Bolsa Família',
            'sigla' => 'PMJ/SMDS/PBF - Programa Bolsa Família',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Cadastro Unico para Programas Sociais',
            'sigla' => 'PMJ/SMDS/CUPS - Cadastro Unico para Programas Sociais',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Proteção Social Básica',
            'sigla' => 'PMJ/SMDS/PSB - Proteção Social Básica',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Centro de Referencia de Assistencia Social',
            'sigla' => 'PMJ/SMDS/CRAS - Centro de Referencia de Assistencia Social',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Serviço de Convivência e Fortalecimento de Vínculos',
            'sigla' => 'PMJ/SMDS/SCFV - Serviço de Convivência e Fortalecimento de Vínculos',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Benefícios Eventuais',
            'sigla' => 'PMJ/SMDS/BE - Benefícios Eventuais',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Proteção Social Especial de Media Complexidade',
            'sigla' => 'PMJ/SMDS/PSEMC - Proteção Social Especial de Média Complexidade',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Centro de Referência Especializado da Assistência Social',
            'sigla' => 'PMJ/SMDS/CREAS - Centro de Referência Especializado da Assistência Social',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Serviço Especializado em Abordagem Social',
            'sigla' => 'PMJ/SMDS/SEAS - Serviço Especializado em Abordagem Social',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Centro de Referência Especializado para população em Situação de Rua',
            'sigla' => 'PMJ/SMDS/CREPSR - Centro de Referência Especializado para população em Situação de Rua',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Núcleo de Atendimento à Mulher',
            'sigla' => 'PMJ/SMDS/NAM - Núcleo de Atendimento à Mulher',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Proteção Social Especial de Alta Complexidade',
            'sigla' => 'PMJ/SMDS/PSEAC - Proteção Social Especial de Alta Complexidade',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Casa de Passagem pra Adultos e Famílias',
            'sigla' => 'PMJ/SMDS/CPAF - Casa de Passagem pra Adultos e Famílias',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Gestão de Políticas Públicas',
            'sigla' => 'PMJ/SMDS/GPP - Gestão de Políticas Públicas',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Central de Cursos',
            'sigla' => 'PMJ/SMDS/CC - Central de Cursos',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Diretoria de Juventude',
            'sigla' => 'PMJ/SMDS/DJ - Diretoria de Juventude',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Gestão Financeira e Orçamentária',
            'sigla' => 'PMJ/SMDS/GF0 - Gestão Financeira e Orçamentária',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Conselho Municipal de Assistência Social',
            'sigla' => 'PMJ/SMDS/CMAS - Conselho Municipal de Assistência Social',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Conselho Tutelar',
            'sigla' => 'PMJ/SMDS/CT - Conselho Tutelar',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Conselho Municipal dos Direitos da Criança e do Adolescente',
            'sigla' => 'PMJ/SMDS/CMDCA - Conselho Municipal dos Direitos da Criança e do Adolescente',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Vigilância Socioassistencial',
            'sigla' => 'PMJ/SMDS/VS - Vigilância Socioassistencial',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Gabinete',
            'sigla' => 'PMJ/PGM/Gabinete Gabinete',
            'fk_secretaria' => 4,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Recepção',
            'sigla' => 'PMJ/PGM/Recepção - Recepção',
            'fk_secretaria' => 4,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Procuradores',
            'sigla' => 'PMJ/PGM/Procuradores - Procuradores',
            'fk_secretaria' => 4,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Assessoria',
            'sigla' => 'PMJ/PGM/Assessoria - Assessoria',
            'fk_secretaria' => 4,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Gabinete',
            'sigla' => 'PMJ/SMF/Gabinete - Gabinete',
            'fk_secretaria' => 5,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Secretaria',
            'sigla' => 'PMJ/SMF/Secretaria - Secretaria',
            'fk_secretaria' => 5,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Setor de Tributos',
            'sigla' => 'PMJ/SMF/ST - Setor de Tributos',
            'fk_secretaria' => 5,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Setor de Contabilidade',
            'sigla' => 'PMJ/SMF/SC - Setor de Contabilidade',
            'fk_secretaria' => 5,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Tesouraria',
            'sigla' => 'PMJ/SMF/Tesouraria - Tesouraria',
            'fk_secretaria' => 5,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Cadastro',
            'sigla' => 'PMJ/SMF/Cadastro - Cadastro',
            'fk_secretaria' => 5,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Gabinete',
            'sigla' => 'PMJ/SMG/Gabinete - Gabinete',
            'fk_secretaria' => 6,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Setor de Eventos e Projetos',
            'sigla' => 'PMJ/SMF/SEP - Setor de Eventos e Projetos',
            'fk_secretaria' => 6,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Assessoria Tecnica Especial',
            'sigla' => 'PMJ/SMF/ATE - Assessoria Tecnica Especial',
            'fk_secretaria' => 6,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Guarda Municipal',
            'sigla' => 'PMJ/SMF/GM - Guarda Municipal',
            'fk_secretaria' => 6,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Setor de Distritos',
            'sigla' => 'PMJ/SMF/SD - Setor de Distritos',
            'fk_secretaria' => 6,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Ouvidoria',
            'sigla' => 'PMJ/SMF/Ouvidoria - Ouvidoria',
            'fk_secretaria' => 6,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Gabinete',
            'sigla' => 'PMJ/SMI/Gabinete - Gabinete',
            'fk_secretaria' => 7,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Setor de Fiscalizacao',
            'sigla' => 'PMJ/SMF/SF - Setor de Fiscalizacao',
            'fk_secretaria' => 7,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Setor de Engenharia',
            'sigla' => 'PMJ/SMF/SE - Setor de Engenharia',
            'fk_secretaria' => 7,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Setor de Convenios',
            'sigla' => 'PMJ/SMF/SC - Setor de Convenios',
            'fk_secretaria' => 7,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Setor de Recursos Humanos',
            'sigla' => 'PMJ/SMF/SRH - Setor de Recursos Humanos',
            'fk_secretaria' => 7,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Gabinete',
            'sigla' => 'PJM/SMAIMA/Gabinete - Gabinete',
            'fk_secretaria' => 8,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Divisao Administrativa Financeira',
            'sigla' => 'PJM/SMAIMA/DAF - Divisao Administrativa Financeira',
            'fk_secretaria' => 8,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Divisao de Estudos e Projetos',
            'sigla' => 'PJM/SMAIMA/DEP - Divisao de Estudos e Projetos',
            'fk_secretaria' => 8,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Expansao Social',
            'sigla' => 'PJM/SMAIMA/ES - Expansao Social',
            'fk_secretaria' => 8,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Meio Ambiente',
            'sigla' => 'PJM/SMAIMA/MA - Meio Ambiente',
            'fk_secretaria' => 8,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Gabinete',
            'sigla' => 'PJM/SMCT/Gabinete - Gabinete',
            'fk_secretaria' => 9,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Coordenacao Administrativa Financeira',
            'sigla' => 'PJM/SMCT/CAF - Coordenacao Administrativa Financeira',
            'fk_secretaria' => 9,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Divisao de Programas e Projetos',
            'sigla' => 'PJM/SMCT/DPP - Divisao de Programas e Projetos',
            'fk_secretaria' => 9,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Diretoria de Turismo',
            'sigla' => 'PJM/SMCT/DT - Diretoria de Turismo',
            'fk_secretaria' => 9,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Supervisao de Cumprimento de Diretrizes da Política Publica de Incentivo a Cultura',
            'sigla' => 'PJM/SMCT/SCDPPIC - Supervisao de Cumprimento de Diretrizes da Política Publica de Incentivo a Cultura',
            'fk_secretaria' => 9,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Casa de Cultura',
            'sigla' => 'PJM/SMCT/CC - Casa de Cultura',
            'fk_secretaria' => 9,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Museu',
            'sigla' => 'PJM/SMCT/Museu - Museu',
            'fk_secretaria' => 9,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Proarte',
            'sigla' => 'PJM/SMCT/Proarte - Proarte',
            'fk_secretaria' => 9,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Gabinete',
            'sigla' => 'PJM/SMEL/Gabinete - Gabinete',
            'fk_secretaria' => 10,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Diretoria de Esportes',
            'sigla' => 'PJM/SMEL/DE - Diretoria de Esportes',
            'fk_secretaria' => 10,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Divisao de Esporte Educacional',
            'sigla' => 'PJM/SMEL/DEE - Divisao de Esporte Educacional',
            'fk_secretaria' => 10,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Esporte Comunitario e lazer',
            'sigla' => 'PJM/SMEL/ECL - Esporte Comunitario e lazer',
            'fk_secretaria' => 10,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Suprimento e Manutencao',
            'sigla' => 'PJM/SMEL/SM - Suprimento e Manutencao',
            'fk_secretaria' => 10,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Divisao de Programas e Eventos Esportivos',
            'sigla' => 'PJM/SMEL/DPEE - Divisao de Programas e Eventos Esportivos',
            'fk_secretaria' => 10,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Gabinete',
            'sigla' => 'PJM/SMDE/Gabinete - Gabinete',
            'fk_secretaria' => 11,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Assessoria',
            'sigla' => 'PJM/SMDE/Assessoria - Assessoria',
            'fk_secretaria' => 11,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Sala do Empreendedor',
            'sigla' => 'PJM/SMDE/SE - Sala do Empreendedor',
            'fk_secretaria' => 11,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Gabinete',
            'sigla' => 'PJM/CGM/Gabinete - Gabinete',
            'fk_secretaria' => 12,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Divisao de Normas Procedimentos e Orientacao',
            'sigla' => 'PJM/CGM/DNPO - Divisao de Normas Procedimentos e Orientacao',
            'fk_secretaria' => 12,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Divisao de Inspeção e Analise',
            'sigla' => 'PJM/CGM/DIA - Divisao de Inspeção e Analise',
            'fk_secretaria' => 12,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Controle Interno Setorial',
            'sigla' => 'PJM/CGM/CIS - Controle Interno Setorial',
            'fk_secretaria' => 12,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Gabinete',
            'sigla' => 'PJM/SMSP/Gabinete - Gabinete',
            'fk_secretaria' => 13,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Departamento Administrativo Financeira',
            'sigla' => 'PJM/SMSP/DAF - Departamento Administrativo Financeira',
            'fk_secretaria' => 13,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Departamento de Servicos Publicos',
            'sigla' => 'PJM/SMSP/DSP - Departamento de Servicos Publicos',
            'fk_secretaria' => 13,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Recursos Humanos',
            'sigla' => 'PJM/SMSP/RH - Recursos Humanos',
            'fk_secretaria' => 13,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Divisao de Limpeza Urbana',
            'sigla' => 'PJM/SMSP/DLU - Divisao de Limpeza Urbana',
            'fk_secretaria' => 13,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Divisao de Pracas Parques e Jardins',
            'sigla' => 'PJM/SMSP/DPPJ - Divisao de Pracas Parques e Jardins',
            'fk_secretaria' => 13,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Iluminação Publica',
            'sigla' => 'PJM/SMSP/IL - Iluminação Publica',
            'fk_secretaria' => 13,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Superintendencia Municipal de Transito',
            'sigla' => 'PJM/SMSP/SUMTRAM - Superintendencia Municipal de Transito',
            'fk_secretaria' => 13,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Gabinete',
            'sigla' => 'PJM/SRICS/Gabinete - Gabinete',
            'fk_secretaria' => 14,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Assessoria',
            'sigla' => 'PJM/SRICS/Assessoria - Assessoria',
            'fk_secretaria' => 14,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Coordenacao',
            'sigla' => 'PJM/SIC/Coordenacao - Coordenacao',
            'fk_secretaria' => 15,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Protocolo',
            'sigla' => 'PJM/Protocolo/Protocolo - Protocolo',
            'fk_secretaria' => 16,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Gabinete do Secretario',
            'sigla' => 'PJM/SMS/Gabinete - Gabinete do Secretario',
            'fk_secretaria' => 17,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Assessoria de Controle, Avaliacao e Auditoria',
            'sigla' => 'PJM/SMS/ACAA - Assessoria de Controle, Avaliacao e Auditoria',
            'fk_secretaria' => 17,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Central de Regulacao de Assistência de Saude',
            'sigla' => 'PJM/SMS/CRAS - Central de Regulacao de Assistência de Saude',
            'fk_secretaria' => 17,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Departamento de Planejamento e Acompanhamento da Gestao Descentralizada',
            'sigla' => 'PJM/SMS/DPAGD - Departamento de Planejamento e Acompanhamento da Gestao Descentralizada',
            'fk_secretaria' => 17,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Nucleo de Informacao em Saude',
            'sigla' => 'PJM/SMS/NIS - Nucleo de Informacao em Saude',
            'fk_secretaria' => 17,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Departamento de Administrativo e Financeiro',
            'sigla' => 'PJM/SMS/DAF - Departamento de Administrativo e Financeiro',
            'fk_secretaria' => 17,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Departamento de Assistencia a Saude',
            'sigla' => 'PJM/SMS/DAS - Departamento de Assistencia a Saude',
            'fk_secretaria' => 17,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Departamento de Vigilancia Epidemiologica e Saude do Trabalhador',
            'sigla' => 'PJM/SMS/DVEST - Departamento de Vigilancia Epidemiologica e Saude do Trabalhador',
            'fk_secretaria' => 17,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Departamento de Vigilancia Sanitaria e Ambiental',
            'sigla' => 'PJM/SMS/DVSA - Departamento de Vigilancia Sanitaria e Ambiental',
            'fk_secretaria' => 17,
            'status' => 'Ativo',
            'email' => 'cpds.fabrica@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);
    }
}
