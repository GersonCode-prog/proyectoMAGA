<?php

namespace App\Http\Controllers;

use App\Models\Cader;
use Illuminate\Http\Request;

class CaderController extends Controller
{
    /**
     * Mostrar una lista del recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('caders.index');
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Almacene un recurso recién creado en el almacenamiento BD.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Muestra el recurso especificado.
     *
     * @param  \App\Models\Cader  $cader
     * @return \Illuminate\Http\Response
     */
    public function show(Cader $cader)
    {
        //
    }

    /**
     * Muestra el formulario para editar el recurso especificado.
     *
     * @param  \App\Models\Cader  $cader
     * @return \Illuminate\Http\Response
     */
    public function edit(Cader $cader)
    {
        //
    }

    /**
     * Actualice el recurso especificado en el almacenamiento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cader  $cader
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cader $cader)
    {
        //
    }

    /**
     * Elimina el recurso especificado del almacenamiento.
     *
     * @param  \App\Models\Cader  $cader
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cader $cader)
    {
        //
    }
}
