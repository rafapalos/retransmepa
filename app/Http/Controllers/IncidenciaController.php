<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incidencia;

class IncidenciaController extends Controller {
      // Función para cuando aun no te has logueado, no se pueda acceder a las demás páginas.
      public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $incidencias = Incidencia::all();
        return view('incidencia.index')->with('incidencias', $incidencias);
    }

    // Función para añadir incidencias
    public function create() {
        return view('incidencia.create');
    }

    public function store(Request $request) {
        $incidencias = new Incidencia();

        $incidencias-> nombreEmpleado = $request->get('nombreEmpleado');
        $incidencias-> sector = $request->get('sector');
        $incidencias-> descripcion = $request->get('descripcion');
        $incidencias-> estado = $request->get('estado');
        $incidencias-> sancion = $request->get('sancion');
        $incidencias-> fecha = $request->get('fecha');

        $incidencias->save();

        return redirect('/incidencias');
    }

    public function show($id) {
        //
    }

    // Función para el botón de editar del dataTables
    public function edit($id) {
        $incidencia = Incidencia::find($id);
        return view('incidencia.edit')->with('incidencia',$incidencia);
    }

    public function update(Request $request, $id)
    {
        $incidencia = Incidencia::find($id);

        $incidencia-> nombreEmpleado = $request->get('nombreEmpleado');
        $incidencia-> sector = $request->get('sector');
        $incidencia-> descripcion = $request->get('descripcion');
        $incidencia-> estado = $request->get('estado');
        $incidencia-> sancion = $request->get('sancion');
        $incidencia-> fecha = $request->get('fecha');

        $incidencia->save();

        return redirect('/incidencias');
    }

    // Función para el botón de eliminar del dataTables
    public function destroy($id) {
        $incidencia = Incidencia::find($id);
        $incidencia->delete();
        return redirect('/incidencias');
    }
}
