<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\Capacitacion;
use Illuminate\Http\Request;
use PDF;
use DB;
class AsistenciaController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Capacitacion $capacitacion)
    {
        //
       // dd($capacitacion->nombre);
        return view('asistencia.index',compact('capacitacion'));
    }

    public function createPDF($id) {
        $capacitacion = Capacitacion::where('id',$id)->get();
     

        $asistencias= Asistencia::where('capacitacion_id', $capacitacion[0]->id)->get();
      
        view()->share('asistencia.index',['capacitacion','asistencias']);
        $pdf=Pdf::loadview('reportes.index',compact(['capacitacion','asistencias'])); 
         return $pdf->download('reporte.pdf');

       
      }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $asistencias=Asistencia::select( DB::raw('COUNT(persona_id) as persona'))
                                ->groupBy('capacitacion_id')
                                ->where('activo','si')
                                ->get();
        $data=Capacitacion::where('activo','si')->get();
        return view('dashboard', compact('data','asistencias'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function show(Asistencia $asistencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Asistencia $asistencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asistencia $asistencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asistencia $asistencia)
    {
        //
    }
}
