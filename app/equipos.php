<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class equipos extends Model
{
    //
    protected $table = 'equipos';
    protected $primaryKey = 'id';
    // protected $visible = ['id','activo','pais','grupo','nonbre_grupo','updated_at'];
    // 'activo' => true, 
    // 'pais' => 'Portugal',
    // 'grupo' => true,
    // 'nombre_grupo' => 'Grupo F'
}
