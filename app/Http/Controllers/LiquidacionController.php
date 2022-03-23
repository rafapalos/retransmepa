<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Liquidacion;

class LiquidacionController extends Controller {
    // Función para cuando aun no te has logueado, no se pueda acceder a las demás páginas.
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $liquidaciones = liquidacion::all();
        return view('liquidacion.index')->with('liquidaciones', $liquidaciones);
    }

    // Función para añadir liquidacion
    public function create() {
        return view('liquidacion.create');
    }

    public function store(Request $request) {
        $liquidaciones = new Liquidacion();

        $liquidaciones-> numRepartidor = $request->get('numRepartidor');
        $liquidaciones-> nombre = $request->get('nombre');
        $liquidaciones-> entregas = $request->get('entregas');
        $liquidaciones-> recojidas = $request->get('recojidas');
        $liquidaciones-> incidencias = $request->get('incidencias');
        $liquidaciones-> diaTrabajado = $request->get('diaTrabajado');
        $liquidaciones-> fecha = $request->get('fecha');
        $liquidaciones-> codPostal = $request->get('codPostal');

        $liquidaciones->save();

        return redirect('/liquidaciones');
    }

    public function show($id) {
        //
    }

    // Función para el botón de editar del dataTables
    public function edit($id) {
        $liquidacion = Liquidacion::find($id);
        return view('liquidacion.edit')->with('liquidacion',$liquidacion);
    }

    public function update(Request $request, $id) {
        $liquidacion = Liquidacion::find($id);

        $liquidacion-> numRepartidor = $request->get('numRepartidor');
        $liquidacion-> nombre = $request->get('nombre');
        $liquidacion-> entregas = $request->get('entregas');
        $liquidacion-> recojidas = $request->get('recojidas');
        $liquidacion-> incidencias = $request->get('incidencias');
        $liquidacion-> diaTrabajado = $request->get('diaTrabajado');
        $liquidacion-> fecha = $request->get('fecha');
        $liquidacion-> codPostal = $request->get('codPostal');

        $liquidacion->save();

        return redirect('/liquidaciones');
    }

    // Función para el botón de eliminar del dataTables
    public function destroy($id) {
        $liquidacion = Liquidacion::find($id);
        $liquidacion->delete();
        return redirect('/liquidaciones');
    }
}
