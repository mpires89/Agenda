<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ContatosTableSeeder extends Seeder
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
            \App\Models\Contato::create([
                'nome' => Str::random(10),
                'sobrenome' => Str::random(12),
                'email' => Str::random(8) . '@exemplo.com',
                'telefone' => mt_rand(10000000, 99999999)
            ]);
        }
    }
}
