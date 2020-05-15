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
            'sigla' => 'Gabinete',
            'fk_secretaria' => 1,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Conselho de Alimentacao Escolar',
            'sigla' => 'CAE',
            'fk_secretaria' => 1,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Conselho Municipal de Educacao',
            'sigla' => 'CME',
            'fk_secretaria' => 1,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Nucleo de Alimentacao Central das Escolas Municipais',
            'sigla' => 'NACEM',
            'fk_secretaria' => 1,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Departamento Pedagógico',
            'sigla' => 'Depto Pedagogico',
            'fk_secretaria' => 1,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Divisão de Alimentos Escolar',
            'sigla' => 'DAE',
            'fk_secretaria' => 1,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Departamento de Projetos',
            'sigla' => 'Depto de Projetos',
            'fk_secretaria' => 1,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Departamento de Recursos Humanos',
            'sigla' => 'RH',
            'fk_secretaria' => 1,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Regime Especial de Direito Administrativo',
            'sigla' => 'REDA',
            'fk_secretaria' => 1,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Anos Finais',
            'sigla' => 'Anos Finais',
            'fk_secretaria' => 1,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Gabinete',
            'sigla' => 'Gabinete',
            'fk_secretaria' => 2,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Depto. Compras e Licitações',
            'sigla' => 'Depto. Compras e Licitações',
            'fk_secretaria' => 2,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Depto. De Recursos Humanos',
            'sigla' => 'Depto. De Recursos Humanos',
            'fk_secretaria' => 2,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Depto. De Materiais e Patrimônio',
            'sigla' => 'DEMAP',
            'fk_secretaria' => 2,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Depto. Nacional de Infraestrutura de Transportes',
            'sigla' => 'DENIT',
            'fk_secretaria' => 2,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Depto. De Informática',
            'sigla' => 'Depto. De Informática',
            'fk_secretaria' => 2,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Gabinete',
            'sigla' => 'Gabinete',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Sistema Unico de Assistencia Social',
            'sigla' => 'SUAS',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Sistema Unico de Assistencia Social',
            'sigla' => 'SUAS',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Restaurante Popular',
            'sigla' => 'Restaurante Popular',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Programa Bolsa Família',
            'sigla' => 'Programa Bolsa Família',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Cadastro Unico para Programas Sociais',
            'sigla' => 'Cadastro Unico para Programas Sociais',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Proteção Social Básica',
            'sigla' => 'Proteção Social Básica',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Centro de Referencia de Assistencia Social',
            'sigla' => 'CRAS',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Serviço de Convivência e Fortalecimento de Vínculos',
            'sigla' => 'SCFV',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Benefícios Eventuais',
            'sigla' => 'Benefícios Eventuais',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Proteção Social Especial de Media Complexidade',
            'sigla' => 'Proteção Social Especial de Média Complexidade',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Centro de Referência Especializado da Assistência Social',
            'sigla' => 'CREAS',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Serviço Especializado em Abordagem Social',
            'sigla' => 'Serviço Especializado em Abordagem Social',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Centro de Referência Especializado para população em Situação de Rua',
            'sigla' => 'Centro POP',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Núcleo de Atendimento à Mulher',
            'sigla' => 'NAM',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Proteção Social Especial de Alta Complexidade',
            'sigla' => 'Proteção Social Especial de Alta Complexidade',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Casa de Passagem pra Adultos e Famílias',
            'sigla' => 'Casa de Passagem pra Adultos e Famílias',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Gestão de Políticas Públicas',
            'sigla' => 'Gestão de Políticas Públicas',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Central de Cursos',
            'sigla' => 'Central de Cursos',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Diretoria de Juventude',
            'sigla' => 'Diretoria de Juventude',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Gestão Financeira e Orçamentária',
            'sigla' => 'Gestão Financeira e Orçamentária',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Conselho Municipal de Assistência Social',
            'sigla' => 'Conselho Municipal de Assistência Social',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Conselho Tutelar',
            'sigla' => 'Conselho Tutelar',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Conselho Municipal dos Direitos da Criança e do Adolescente',
            'sigla' => 'CMDCA',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Vigilância Socioassistencial',
            'sigla' => 'Vigilância Socioassistencial',
            'fk_secretaria' => 3,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Gabinete',
            'sigla' => 'Gabinete',
            'fk_secretaria' => 4,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Recepção',
            'sigla' => 'Recepção',
            'fk_secretaria' => 4,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Procuradores',
            'sigla' => 'Procuradores',
            'fk_secretaria' => 4,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Assessoria',
            'sigla' => 'Assessoria',
            'fk_secretaria' => 4,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Gabinete',
            'sigla' => 'Gabinete',
            'fk_secretaria' => 5,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Secretaria',
            'sigla' => 'Secretaria',
            'fk_secretaria' => 5,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Setor de Tributos',
            'sigla' => 'Setor de Tributos',
            'fk_secretaria' => 5,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Setor de Contabilidade',
            'sigla' => 'Setor de Contabilidade',
            'fk_secretaria' => 5,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Tesouraria',
            'sigla' => 'Tesouraria',
            'fk_secretaria' => 5,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Cadastro',
            'sigla' => 'Cadastro',
            'fk_secretaria' => 5,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Gabinete',
            'sigla' => 'Gabinete',
            'fk_secretaria' => 6,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Setor de Eventos e Projetos',
            'sigla' => 'Setor de Eventos e Projetos',
            'fk_secretaria' => 6,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Assessoria Tecnica Especial',
            'sigla' => 'Assessoria Tecnica Especial',
            'fk_secretaria' => 6,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Guarda Municipal',
            'sigla' => 'Guarda Municipal',
            'fk_secretaria' => 6,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Setor de Distritos',
            'sigla' => 'Setor de Distritos',
            'fk_secretaria' => 6,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Ouvidoria',
            'sigla' => 'Ouvidoria',
            'fk_secretaria' => 6,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Gabinete',
            'sigla' => 'Gabinete',
            'fk_secretaria' => 7,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Setor de Fiscalizacao',
            'sigla' => 'Setor de Fiscalizacao',
            'fk_secretaria' => 7,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Setor de Engenharia',
            'sigla' => 'Setor de Engenharia',
            'fk_secretaria' => 7,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Setor de Convenios',
            'sigla' => 'Setor de Convenios',
            'fk_secretaria' => 7,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Setor de Recursos Humanos',
            'sigla' => 'RH',
            'fk_secretaria' => 7,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Gabinete',
            'sigla' => 'Gabinete',
            'fk_secretaria' => 8,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Divisao Administrativa Financeira',
            'sigla' => 'Divisao Administrativa Financeira',
            'fk_secretaria' => 8,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Divisao de Estudos e Projetos',
            'sigla' => 'Divisao de Estudos e Projetos',
            'fk_secretaria' => 8,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Expansao Social',
            'sigla' => 'Expansao Social',
            'fk_secretaria' => 8,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Meio Ambiente',
            'sigla' => 'Meio Ambiente',
            'fk_secretaria' => 8,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Gabinete',
            'sigla' => 'Gabinete',
            'fk_secretaria' => 9,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Coordenacao Administrativa Financeira',
            'sigla' => 'Coordenacao Administrativa Financeira',
            'fk_secretaria' => 9,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Divisao de Programas e Projetos',
            'sigla' => 'Divisao de Programas e Projetos',
            'fk_secretaria' => 9,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Diretoria de Turismo',
            'sigla' => 'Diretoria de Turismo',
            'fk_secretaria' => 9,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Supervisao de Cumprimento de Diretrizes da Política Publica de Incentivo a Cultura',
            'sigla' => 'Supervisao de Cumprimento de Diretrizes da Política Publica de Incentivo a Cultura',
            'fk_secretaria' => 9,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Casa de Cultura',
            'sigla' => 'Casa de Cultura',
            'fk_secretaria' => 9,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Museu',
            'sigla' => 'Museu',
            'fk_secretaria' => 9,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Proarte',
            'sigla' => 'Proarte',
            'fk_secretaria' => 9,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Gabinete',
            'sigla' => 'Gabinete',
            'fk_secretaria' => 10,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Diretoria de Esportes',
            'sigla' => 'Diretoria de Esportes',
            'fk_secretaria' => 10,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Divisao de Esporte Educacional',
            'sigla' => 'Divisao de Esporte Educacional',
            'fk_secretaria' => 10,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Esporte Comunitario e lazer',
            'sigla' => 'Esporte Comunitario e lazer',
            'fk_secretaria' => 10,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Suprimento e Manutencao',
            'sigla' => 'Suprimento e Manutencao',
            'fk_secretaria' => 10,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Divisao de Programas e Eventos Esportivos',
            'sigla' => 'Divisao de Programas e Eventos Esportivos',
            'fk_secretaria' => 10,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Gabinete',
            'sigla' => 'Gabinete',
            'fk_secretaria' => 11,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Assessoria',
            'sigla' => 'Assessoria',
            'fk_secretaria' => 11,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Sala do Empreendedor',
            'sigla' => 'Sala do Empreendedor',
            'fk_secretaria' => 11,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Gabinete',
            'sigla' => 'Gabinete',
            'fk_secretaria' => 12,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Divisao de Normas Procedimentos e Orientacao',
            'sigla' => 'Divisao de Normas Procedimentos e Orientacao',
            'fk_secretaria' => 12,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Divisao de Inspeção e Analise',
            'sigla' => 'Divisao de Inspeção e Analise',
            'fk_secretaria' => 12,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Controle Interno Setorial',
            'sigla' => 'Controle Interno Setorial',
            'fk_secretaria' => 12,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Gabinete',
            'sigla' => 'Gabinete',
            'fk_secretaria' => 13,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Departamento Administrativo Financeira',
            'sigla' => 'Departamento Administrativo Financeira',
            'fk_secretaria' => 13,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Departamento de Servicos Publicos',
            'sigla' => 'Departamento de Servicos Publicos',
            'fk_secretaria' => 13,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Recursos Humanos',
            'sigla' => 'RH',
            'fk_secretaria' => 13,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Divisao de Limpeza Urbana',
            'sigla' => 'Divisao de Limpeza Urbana',
            'fk_secretaria' => 13,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Divisao de Pracas Parques e Jardins',
            'sigla' => 'Divisao de Pracas Parques e Jardins',
            'fk_secretaria' => 13,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Iluminação Publica',
            'sigla' => 'Iluminação Publica',
            'fk_secretaria' => 13,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Superintendencia Municipal de Transito',
            'sigla' => 'SUMTRAM',
            'fk_secretaria' => 13,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Gabinete',
            'sigla' => 'Gabinete',
            'fk_secretaria' => 14,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Assessoria',
            'sigla' => 'Assessoria',
            'fk_secretaria' => 14,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('setors')->insert([
            'titulo' => 'Coordenacao',
            'sigla' => 'Coordenacao',
            'fk_secretaria' => 15,
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
