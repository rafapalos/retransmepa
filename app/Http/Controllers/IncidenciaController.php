<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incidencia;
use Illuminate\Support\Facades\DB;

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
        $empleadosIncidenciasTransporte = DB::select("SELECT id, nombre, apellidos FROM empleados WHERE estado = 'Activo' AND empresa != 'LavadosExpress' AND cargo != 'Limpiador'" );
        $empleadosIncidenciasLavadero = DB::select("SELECT id, nombre, apellidos FROM empleados WHERE estado = 'Activo' AND empresa = 'LavadosExpress' AND cargo = 'Limpiador'" );

        return view('incidencia.create', ['empleadosIncidenciasTransporte' => $empleadosIncidenciasTransporte, 'empleadosIncidenciasLavadero' => $empleadosIncidenciasLavadero]);
    }

    public function store(Request $request) {
        $incidencias = new Incidencia();

        $IdNombre = $request->get('nombreEmpleado');
        $idEmpleado = stristr( $IdNombre, "-", true );
        $nombreA = stristr( $IdNombre, "-", false );
        $nombreApellidos = substr($nombreA, 1);

        $incidencias-> nombreEmpleado = $nombreApellidos;
        $incidencias-> sector = $request->get('sector');
        $incidencias-> descripcion = $request->get('descripcion');
        $incidencias-> estado = $request->get('estado');
        $incidencias-> sancion = $request->get('sancion');
        $incidencias-> fecha = $request->get('fecha');
        $incidencias-> id_empleado = $idEmpleado;
        $incidencias-> registrado_por = auth()->user()->name;
        $incidencias->save();

        return redirect('/incidencias');
    }

    public function show($id) {
        //
    }

    // Función para el botón de editar del dataTables
    public function edit($id) {
        $empleadosIncidenciasTransporte = DB::select("SELECT id, nombre, apellidos FROM empleados WHERE estado = 'Activo' AND empresa != 'LavadosExpress' AND cargo != 'Limpiador'" );
        $empleadosIncidenciasLavadero = DB::select("SELECT id, nombre, apellidos FROM empleados WHERE estado = 'Activo' AND empresa = 'LavadosExpress' AND cargo = 'Limpiador'" );

        $incidencia = Incidencia::find($id);

        return view('incidencia.edit', ['empleadosIncidenciasTransporte' => $empleadosIncidenciasTransporte, 'empleadosIncidenciasLavadero' => $empleadosIncidenciasLavadero])->with('incidencia',$incidencia);
        // return view('incidencia.edit')->with('incidencia',$incidencia);
    }

    public function update(Request $request, $id) {
        $incidencia = Incidencia::find($id);

        $IdNombre = $request->get('nombreEmpleado');
        $idEmpleado = stristr( $IdNombre, "-", true );
        $nombreA = stristr( $IdNombre, "-", false );
        $nombreApellidos = substr($nombreA, 1);

        $incidencia-> nombreEmpleado = $nombreApellidos;
        $incidencia-> sector = $request->get('sector');
        $incidencia-> descripcion = $request->get('descripcion');
        $incidencia-> estado = $request->get('estado');
        $incidencia-> sancion = $request->get('sancion');
        $incidencia-> fecha = $request->get('fecha');
        $incidencia-> id_empleado = $idEmpleado;
        $incidencia-> registrado_por = auth()->user()->name;
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
