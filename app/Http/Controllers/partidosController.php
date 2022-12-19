<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\partidos;
use App\equipos;
use App\apuestas;
use App\User;

class partidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    public function index(Request $request)
    {   
        $user_id = Auth::user()->id;
        // return partidos::select('*')
        //         ->leftjoin('apuestas as a', function($join){
        //             $join->on('partidos.partidos_id','=','a.id_partido')
        //             ->where('a.id_usuario','=',Auth::user()->id);
        //         })
        //         ->get();
        // $ap = apuestas::where("id_usuario", "=", auth()->user()->id);
        // $data=partidos::select('*')
                // 'a.id_partido', '=', 'partidos.partidos_id')
                // ->addSelect(partidos::raw('select * from partidos where partidos.id_usuario=1'))
                // ->leftjoin('apuestas as a', function($join){
                //     $join->on('partidos.partidos_id','=','a.id_partido')
                //     ->where('a.id_usuario','=',Auth::user()->id);
                // })
                // ->where("a.id_usuario", "=", 1)//auth()->user()->id)
                // ->with(['equipo_local','equipo_visitante'])
                // ->orderBy('partidos.partidos_id', 'desc')
        //         ->get();
        //   return $data;

        if($request->ajax()){
            $partidos=partidos::select('*')
                ->leftjoin('apuestas as a', function($join){
                    $join->on('partidos.partidos_id','=','a.id_partido')
                    ->where('a.id_usuario','=',Auth::user()->id);
                })
                ->with(['equipo_local','equipo_visitante'])
                ->orderBy('partidos.partidos_id', 'desc')
                ->get();
            // $data=partidos::select('*')
            //     ->leftjoin('apuestas', 'apuestas.id_partido', '=', 'partidos.partidos_id')
            //     ->with(['equipo_local','equipo_visitante'])
            //     ->orderBy('partidos.partidos_id', 'desc')
            //     ->get();

            //return response()->json($data);
             return $partidos;
            // return equipos::all();
        }else{
            return view('partidosB');
        }
    }  
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
     {
        //return $request;
           
             $apuesta = new apuestas();
             $apuesta->id_partido = $request->nuevo_id_partido;// : item.id_partido,
             $apuesta->score_equipo_visitante= $request->nuevo_score_equipo_visitante;//: this.score_equipo_visiatnte,
             $apuesta->score_equipo_local= $request->nuevo_score_equipo_local;//: this.nuevo_score_equipo_local,

             $apuesta->id_usuario = auth()->user()->id;

             //$apuesta->id_usuario = Auth::user()->id;
             $apuesta->save();
          return $apuesta;
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
    //     //
    //return $request;
    //$apuesta = apuestas::find($id);
    $user_id = auth()->user()->id;
    $apuesta = apuestas::where('id_partido','=',$request->id_partido )
                ->where('id_usuario','=',$user_id)->first();
                // ->get();
    // find({
    //     where: {
    //         firstName: "Timber",
    //         lastName: "Saw",
    //     },
    // })
    // $apuesta = apuestas::where('user_id', '=',Input::get('contact_id'))->where('contact_id', '=', Auth::user()->id)->first();
    //  $request_self = Contact::where('user_id', '=',Input::get('contact_id'))->where('contact_id', '=', Auth::user()->id)->first();
    $apuesta->score_equipo_local = $request->score_equipo_local;
    $apuesta->score_equipo_visitante = $request->score_equipo_visitante;
    // // $nota->descripcion = $request->descripcion;
    
    $apuesta->save();
    return $apuesta;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //
    // $equipo = equipos::find($id);
    // $equipo->delete();
    // }
}
