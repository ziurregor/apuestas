<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\partidos;

class apuestasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    public function index(Request $request)
    {   
        //return equipos::all();
        
        // if($request->ajax()){
        //     return apuestas::all();
        // }else{
            return view('apuestasB');
        // }
    }  
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
        // public function create(Request $data) {
        //     try {
        //         $user = Usuario::create([
        //             'usr_usuario' => $data['usuario'],
        //             'usr_clave' => bcrypt($data['password']),
        //             'usr_prs_id' => 1,
        //             'usr_usr_id' => 1,
        //         ]);
        //         session::flash("message", "Se ha registrado el usuario " . $user->usr_usuario . " de manera exitosa!");
        //         return view('admin.landing');
        //     } catch (Exception $e) {
        //         return view('errores.404');
        //     }
        // }
        //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // protected $table = 'equipos';
        // protected $primaryKey = 'id';
        // protected $visible = ['pais'];
        
        
        $equipo = new equipos();
        // 'activo' => true, 
        // 'pais' => 'Portugal',
        // 'pais' => 'Portugal',
        // 'grupo' => true,
        // 'nombre_grupo' => 'Grupo F'
        $equipo->pais = $request->pais;
        // $nota->descripcion = $request->descripcion;
        // $nota->user_id = auth()->id();
        $equipo->save();
        return $equipo;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    $equipo = equipos::find($id);
    $equipo->pais = $request->pais;
    // $nota->descripcion = $request->descripcion;
    $equipo->save();
    return $equipo;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    $equipo = equipos::find($id);
    $equipo->delete();
    }
}
