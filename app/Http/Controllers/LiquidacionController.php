<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Liquidacion;
use Illuminate\Support\Facades\DB;

class LiquidacionController extends Controller {
    // Función para cuando aun no te has logueado, no se pueda acceder a las demás páginas.
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $liquidaciones = liquidacion::all();
        return view('liquidacion.index')->with('liquidaciones', $liquidaciones);
    }

    // Función para añadir
    public function create() {
        $empleadosLiquidaciones = DB::select("SELECT nombre, apellidos FROM empleados WHERE estado = 'Activo' AND empresa != 'LavadosExpress' AND cargo = 'Repartidor'" );
        $vehiculosLiquidaciones = DB::select("SELECT matricula FROM vehiculos WHERE estado = 'Activo'" );
        
        return view('liquidacion.create', ['empleadosLiquidaciones' => $empleadosLiquidaciones], ['vehiculosLiquidaciones' => $vehiculosLiquidaciones]);
    }

    public function store(Request $request) {
        $liquidaciones = new Liquidacion();

        $liquidaciones-> numRepartidor = $request->get('numRepartidor');
        $liquidaciones-> nombre = $request->get('nombre');
        $liquidaciones-> matricula = $request->get('matricula');
        $liquidaciones-> entregas = $request->get('entregas');
        $liquidaciones-> recogidas = $request->get('recogidas');
        $liquidaciones-> incidencias = $request->get('incidencias');
        $liquidaciones-> diaTrabajado = $request->get('diaTrabajado');
        $liquidaciones-> dinero = $request->get('dinero');
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
        $liquidacion-> matricula = $request->get('matricula');
        $liquidacion-> entregas = $request->get('entregas');
        $liquidacion-> recogidas = $request->get('recogidas');
        $liquidacion-> incidencias = $request->get('incidencias');
        $liquidacion-> diaTrabajado = $request->get('diaTrabajado');
        $liquidacion-> dinero = $request->get('dinero');
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
