<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Limpieza;
use Illuminate\Support\Facades\DB;

class LimpiezaController extends Controller {
    // Función para cuando aun no te has logueado, no se pueda acceder a las demás páginas.
    public function __construct(){
        $this->middleware('auth');
    }

    public function index() {
        $limpiezas = Limpieza::all();
        return view('limpieza.index')->with('limpiezas', $limpiezas);
    }

    // Función para añadir limpieza
    public function create() {
        $empleadosLimpiezas = DB::select("SELECT nombre, apellidos FROM empleados WHERE estado = 'Activo' AND empresa = 'LavadosExpress' AND cargo = 'Limpiador'" );

        return view('limpieza.create', ['empleadosLimpiezas' => $empleadosLimpiezas]);
    }

    public function store(Request $request) {
        $limpiezas = new Limpieza();

        $limpiezas-> nombreCliente = $request->get('nombreCliente');
        $limpiezas-> matricula = $request->get('matricula');
        $limpiezas-> marca = $request->get('marca');
        $limpiezas-> modelo = $request->get('modelo');
        $limpiezas-> tipoLavado = $request->get('tipoLavado');
        $limpiezas-> tipoCoche = $request->get('tipoCoche');
        $limpiezas-> precio = $request->get('precio');
        $limpiezas-> fechaLimpieza = $request->get('fechaLimpieza');
        $limpiezas-> empleadoAsignado = $request->get('empleadoAsignado');

        $limpiezas->save();

        return redirect('/limpiezas');
    }

    public function show($id) {
        //
    }

    // Función para el botón de editar del dataTables
    public function edit($id) {
        $limpieza = Limpieza::find($id);
        return view('limpieza.edit')->with('limpieza',$limpieza);
    }

    public function update(Request $request, $id)
    {
        $limpieza = Limpieza::find($id);

        $limpieza-> nombreCliente = $request->get('nombreCliente');
        $limpieza-> matricula = $request->get('matricula');
        $limpieza-> marca = $request->get('marca');
        $limpieza-> modelo = $request->get('modelo');
        $limpieza-> tipoLavado = $request->get('tipoLavado');
        $limpieza-> tipoCoche = $request->get('tipoCoche');
        $limpieza-> precio = $request->get('precio');
        $limpieza-> fechaLimpieza = $request->get('fechaLimpieza');
        $limpieza-> empleadoAsignado = $request->get('empleadoAsignado');

        $limpieza->save();

        return redirect('/limpiezas');
    }

    // Función para el botón de eliminar del dataTables
    public function destroy($id) {
        $limpieza = Limpieza::find($id);
        $limpieza->delete();
        return redirect('/limpiezas');
    }
}
