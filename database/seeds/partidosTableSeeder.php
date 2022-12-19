<?php

use Illuminate\Database\Seeder;
use App\equipos;
use App\partidos;
use Carbon\Carbon;

class partidosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // $dt->year(2015)->month(4)->day(21)->hour(22)->minute(32)->second(5)->toDateTimeString();  
        App\partidos::create([
            'etapa_face' => '4tos de Final',
            'id_local' => 2,
            'id_visitante' => 3,
            'hora_inicio' => Carbon::Create('2022-12-09 11:00:00')->format('Y-m-d H:i:s')
            // create('2000', '01', '01')
            ]);
        App\partidos::create([
            'etapa_face' => '4tos de Final',
            'id_local' => 4,
            'id_visitante' => 5,
            'hora_inicio' => Carbon::Create('2022-12-10 15:00:00')->format('Y-m-d H:i:s')

            ]);
        App\partidos::create([
            'etapa_face' => '4tos de Final',
            'id_local' => 6,
            'id_visitante' => 7,
            'hora_inicio' => Carbon::Create('2022-12-10 09:00:00')->format('Y-m-d H:i:s')

            ]);
        App\partidos::create([
            'etapa_face' => '4tos de Final',
            'id_local' => 8,
            'id_visitante' => 9,
            'hora_inicio' => Carbon::Create('2022-12-10 15:00:00')->format('Y-m-d H:i:s')

            ]);
        // $table->string('etapa_face');
        // $table->integer('id_local');
        // $table->integer('score_local')->unsigned();
        // $table->integer('id_visitante');
        // $table->integer('score_visitante')->unsigned();
        // $table->timestamp("hora_inicio");
        // $table->boolean('alargue')->nullable()->default(false);
        // $table->boolean('penales')->nullable()->default(false);
        // $table->integer('penales_local')->unsigned();
        // $table->integer('penales_visitante')->unsigned();
        // $table->boolean('activo')->nullable()->default(true);
    }
}
