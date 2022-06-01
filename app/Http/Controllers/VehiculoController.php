<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;

class VehiculoController extends Controller {
    // Función para cuando aun no te has logueado, no se pueda acceder a las demás páginas.
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $vehiculos = Vehiculo::all();
        return view('vehiculo.index')->with('vehiculos', $vehiculos);
    }

    // Función para añadir vehiculo
    public function create() {
        return view('vehiculo.create');
    }

    public function store(Request $request) {
        $request->validate([
            // 'id'        => 'required|unique:vehiculos',
            'matricula' => 'required|unique:vehiculos'
        ]);

        $vehiculos = new Vehiculo();

        $vehiculos-> id                   = $request->get('id');

        $vehiculos-> marca                = $request->get('marca');
        $vehiculos-> modelo               = $request->get('modelo');
        $vehiculos-> matricula            = $request->get('matricula');
        $vehiculos-> empresa              = $request->get('empresa');
        $vehiculos-> estado               = $request->get('estado');
        $vehiculos-> propiedad            = $request->get('propiedad');
        $vehiculos-> alquiler             = $request->get('alquiler');
        $vehiculos-> fechaAlquilerDesde   = $request->get('fechaAlquilerDesde');
        $vehiculos-> fechaAlquilerHasta   = $request->get('fechaAlquilerHasta');
        $vehiculos->save();

        return redirect('/vehiculos');
    }

    public function show($id)
    {
        //
    }

    // Función para el botón de editar del dataTables
    public function edit($id)
    {
        $vehiculo = Vehiculo::find($id);
        return view('vehiculo.edit')->with('vehiculo',$vehiculo);
    }

    public function update(Request $request, $id)
    {
        $vehiculo = Vehiculo::find($id);

        // $vehiculo-> id                   = $request->get('id');
        $vehiculo-> marca                = $request->get('marca');
        $vehiculo-> modelo               = $request->get('modelo');
        $vehiculo-> matricula            = $request->get('matricula');
        $vehiculo-> empresa              = $request->get('empresa');
        $vehiculo-> estado               = $request->get('estado');
        $vehiculo-> propiedad            = $request->get('propiedad');
        $vehiculo-> alquiler             = $request->get('alquiler');
        $vehiculo-> fechaAlquilerDesde   = $request->get('fechaAlquilerDesde');
        $vehiculo-> fechaAlquilerHasta   = $request->get('fechaAlquilerHasta');

        $vehiculo->save();

        return redirect('/vehiculos');
    }

    // Función para el botón de eliminar del dataTables
    public function destroy($id)
    {
        $vehiculo = Vehiculo::find($id);
        $vehiculo->delete();
        return redirect('/vehiculos');
    }
}
