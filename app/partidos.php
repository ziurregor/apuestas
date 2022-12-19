<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class partidos extends Model
{
    //
    public function equipo_local()
    {
        return $this->belongsTo('App\equipos','id_local','id');
        // hasOne('App\equipos','id','id_local');
    }
    public function equipo_visitante()
    {
        return $this->belongsTo('App\equipos','id_visitante','id');
        // hasOne('App\equipos','id','id_local');
    }
    // public function user() { return $this->belongsTo('App\User'); }

    protected $table = 'partidos';
    protected $primaryKey = 'partidos_id';
    // protected $visible = ['id','etapa_face','id_local','id_visitante','hora_inicio'];
    // ,'id_local','id_visitante','updated_at'];

    // public function PaisPartido()
    // {
    //     return $this->hasOneThrough(equipos::class, partidos::class,
    //             'id_equipo',
    //             'id_partido',
    //             'id',
    //             'id');
    // }
}
