<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MensagensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i<10; $i++)
        {
            \App\Models\Mensagem::create([
                'contato_id' => $i+1,
                'descricao' => Str::random(25).'gerado pelo seeder',
            ]);
        }
    }
}
