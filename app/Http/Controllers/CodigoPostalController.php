<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CodigoPostal;

class CodigoPostalController extends Controller
{
    // Función para cuando aun no te has logueado, no se pueda acceder a las demás páginas.
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $codigopostales = CodigoPostal::all();
        return view('codigopostal.index')->with('codigopostales', $codigopostales);
    }

    // Función para añadir codigo postal
    public function create() {
        return view('codigopostal.create');
    }

    public function store(Request $request) {
        $request->validate([
            'codigopostal' => 'required|unique:codigo_postals'
        ]);

        $codigopostales = new CodigoPostal();

        $codigopostales-> localidad = $request->get('localidad');
        $codigopostales-> municipio = $request->get('municipio');
        $codigopostales-> codigoPostal = $request->get('codigopostal');

        $codigopostales->save();

        return redirect('/codigopostales');
    }

    // Función para el botón de editar del dataTables
    public function edit($id) {
        $codigopostal = CodigoPostal::find($id);
        return view('codigopostal.edit')->with('codigopostal',$codigopostal);
    }

    public function update(Request $request, $id) {
        $codigopostal = CodigoPostal::find($id);

        $codigopostal-> localidad = $request->get('localidad');
        $codigopostal-> municipio = $request->get('municipio');
        $codigopostal-> codigoPostal = $request->get('codigopostal');

        $codigopostal->save();

        return redirect('/codigopostales');
    }

    // Función para el botón de eliminar del dataTables
    public function destroy($id) {
        $cogigopostal = CodigoPostal::find($id);
        $cogigopostal->delete();
        return redirect('/codigopostales');
    }
}
