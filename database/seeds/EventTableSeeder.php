<?php

use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'titulo' => 'Teste',
            'inicio' => '2020-10-11 21:30:00',
            'fim' => '2020-11-11 22:30:00',
            'cor' => '797ac4',
            'descricao' => 'Teste',
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('events')->insert([
            'titulo' => 'Reuniao teste',
            'inicio' => '2020-08-11 21:30:00',
            'fim' => '2020-09-11 22:30:00',
            'cor' => '35793c',
            'descricao' => 'Teste',
            'status' => 'Ativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}