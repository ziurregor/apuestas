<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


class equiposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App\equipos::create([
            'activo' => true, 
            'pais' => 'Bolivia',
            'grupo' => false,
            'nombre_grupo' => 'Grupo Z'
        ]);
        App\equipos::create([
            'activo' => true, 
            'pais' => 'Croacia',
            'grupo' => true,
            'nombre_grupo' => 'Grupo F'
        ]);
        App\equipos::create([
            'activo' => true, 
            'pais' => 'Brazil',
            'grupo' => true,
            'nombre_grupo' => 'Grupo F'
        ]);
        App\equipos::create([
            'activo' => true, 
            'pais' => 'Países Bajos',
            'grupo' => true,
            'nombre_grupo' => 'Grupo F'
        ]);
        App\equipos::create([
            'activo' => true, 
            'pais' => 'Argentina',
            'grupo' => true,
            'nombre_grupo' => 'Grupo F'
        ]);
        App\equipos::create([
            'activo' => true, 
            'pais' => 'Marruecos',
            'grupo' => true,
            'nombre_grupo' => 'Grupo F'
        ]);
        App\equipos::create([
            'activo' => true, 
            'pais' => 'Portugal',
            'grupo' => true,
            'nombre_grupo' => 'Grupo F'
        ]);
        App\equipos::create([
            'activo' => true, 
            'pais' => 'Inglaterra',
            'grupo' => true,
            'nombre_grupo' => 'Grupo F'
        ]);
        App\equipos::create([
            'activo' => true, 
            'pais' => 'Francia',
            'grupo' => true,
            'nombre_grupo' => 'Grupo F'
        ]);

       
            // $table->boolean('activo')->nullable()->default(true);
            // $table->string('pais');
            // $table->boolean('grupo')->nullable()->default(false);
            // $table->string('nombre_grupo');
    }
}
