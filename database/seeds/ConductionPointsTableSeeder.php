<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ConductionPointsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \Illuminate\Support\Facades\DB::table('conduction_points')->insert([
            ['name' => 'Alergia ponto', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Alergia 1', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Alergia 2', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Amígdala', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Analgesia', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Ansiedade (canto lóbulo)', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Ansiedade (quase escafa)', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Antebraço', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Anti-depressivo', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Ápice da orelha', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Área triangular do Ciático', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Articulação Cotovelo', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Articulação Ombro', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'ATM', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Baço', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Bexiga', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Braço', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Cárdia', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Cefaleia', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Cérebro', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Cervicais – vertebras', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Clavícula', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Constipação', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Coração', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Coxa', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Dedos', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Dente', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Diafragma', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Endócrino (pericárdio)', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Epistaxe', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Esôfago', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Estômago', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Fígado', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Fome', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Hipotensor', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Inteligência', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Intestino delgado', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Intestino grosso', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Joelho', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Laringe/Faringe', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Lombares – vertebras', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Mandíbula', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Maxilar', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Nariz externo', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Nervo Ciático', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Nicotina', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Occipital', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Olho', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Ovário', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Pé (tornozelo, calcanhar ou artelhos)', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Perna', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Pescoço', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Ponto zero', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Pulmão 1', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Pulmão 2', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Pulso', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Quadril', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Relaxamento muscular', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Rim', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Sacro-cóccix', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'San Jiao', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Sede', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Shen Men', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Simpático', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Sono – área de distúrbio', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Supra-renal', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Tireóide', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Torácicas – vertebras', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Tronco Cerebral', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Útero', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Vertigem', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Vesícula biliar', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Vícios Mania', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Yang Fígado 1', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'Yang Fígado 2', 'created_at' => \Carbon\Carbon::now()]
        ]);


    }
}
