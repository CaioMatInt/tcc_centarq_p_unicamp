<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ComplaintsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \Illuminate\Support\Facades\DB::table('complaints')->insert([
            [
                'name' => 'Dor Aguda (cabeça)',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dor Aguda (pescoço)',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dor Aguda (coluna)',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dor Aguda (ombro)',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dor Aguda (cotovelo)',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dor Aguda (punho)',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dor Aguda (punho)',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dor Aguda (quadril)',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dor Aguda (cóccix)',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dor Aguda (joelho)',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dor Aguda (calcanhar)',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dor Aguda (pé)',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dor Aguda (estômago)',
                'created_at' => \Carbon\Carbon::now()
            ]
            ,
            [
                'name' => 'Dor Crônica (cabeça)',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dor Crônica (pescoço)',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dor Crônica (coluna)',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dor Crônica (ombro)',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dor Crônica (cotovelo)',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dor Crônica (punho)',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dor Crônica (punho)',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dor Crônica (quadril)',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dor Crônica (cóccix)',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dor Crônica (joelho)',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dor Crônica (calcanhar)',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dor Crônica (pé)',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dor Crônica (estômago)',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Alergia',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Angústia',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Ansiedade',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Artrose',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Baixa Autoestima',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Cansaço',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Cólica Menstrual',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Depressão',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Desânimo',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Diabetes',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dor Muscular',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Emocional',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Estresse',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Falta de concentração',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Frustração',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Hipertensão Arterial',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Insônia',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Irritação',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Luto',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Medo',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Preocupação',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Rinite',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Síndrome do Pânico',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Sinusite',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Sono (alteração/insônia)',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Tosse',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'TPM',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Tristeza',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Vertigem/Tontura',
                'created_at' => \Carbon\Carbon::now()
            ]


        ]);

    }
}
