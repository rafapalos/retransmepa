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
        $empleadosLiquidaciones = DB::select("SELECT id, nombre, apellidos FROM empleados WHERE estado = 'Activo' AND empresa = 'GLS' AND cargo = 'Repartidor'" );
        $vehiculosLiquidaciones = DB::select("SELECT id, matricula FROM vehiculos WHERE estado = 'Activo' AND empresa = 'GLS'");
        $codPostalesLiquidaciones = DB::select("SELECT id, codigoPostal FROM codigo_postals");

        return view('liquidacion.create', ['empleadosLiquidaciones' => $empleadosLiquidaciones, 'vehiculosLiquidaciones' => $vehiculosLiquidaciones, 'codPostalesLiquidaciones' => $codPostalesLiquidaciones]);

    }

    public function store(Request $request) {
        $liquidaciones = new Liquidacion();

        $IdNombre = $request->get('nombre');
        $idEmpleado = stristr( $IdNombre, "-", true );
        $nombreA = stristr( $IdNombre, "-", false );
        $nombreApellidos = substr($nombreA, 1);

        $IdMatricula = $request->get('matricula');
        $idVehiculo = stristr( $IdMatricula, "-", true );
        $matriculaConGuion = stristr( $IdMatricula, "-", false );
        $matricula = substr($matriculaConGuion, 1);

        $IdCodigoPostal = $request->get('codPostal');
        $idPostal = stristr($IdCodigoPostal, "-", true );
        $codigoPostalConGuion = stristr( $IdCodigoPostal, "-", false );
        $codPostal = substr($codigoPostalConGuion, 1);

        $liquidaciones-> numRepartidor = $request->get('numRepartidor');
        $liquidaciones-> nombre = $nombreApellidos;
        $liquidaciones-> id_empleado = $idEmpleado;
        $liquidaciones-> id_vehiculo = $idVehiculo;
        $liquidaciones-> id_codigo_postal = $idPostal;
        $liquidaciones-> matricula = $matricula;
        $liquidaciones-> entregas = $request->get('entregas');
        $liquidaciones-> recogidas = $request->get('recogidas');
        $liquidaciones-> incidencias = $request->get('incidencias');
        $liquidaciones-> diaTrabajado = $request->get('diaTrabajado');
        $liquidaciones-> dinero = $request->get('dinero');
        $liquidaciones-> fecha = $request->get('fecha');
        $liquidaciones-> codPostal = $codPostal;
        $liquidaciones-> registrado_por = auth()->user()->name;

        $liquidaciones->save();

        return redirect('/liquidaciones');
    }

    // Función para el botón de editar del dataTables
    public function edit($id) {
        $matriculaEdit = DB::select("SELECT id, matricula FROM vehiculos WHERE estado = 'Activo' AND empresa = 'GLS'");
        $empleadosEdit = DB::select("SELECT id, nombre, apellidos FROM empleados WHERE estado = 'Activo' AND empresa = 'GLS' AND cargo = 'Repartidor'" );
        $codPostalesEdit = DB::select("SELECT id, codigoPostal FROM codigo_postals");
        
        $liquidacion = Liquidacion::find($id);

        return view('liquidacion.edit', ['matriculaEdit' => $matriculaEdit, 'empleadosEdit' => $empleadosEdit, 'codPostalesEdit' => $codPostalesEdit])->with('liquidacion',$liquidacion);
    }

    public function update(Request $request, $id) {
        $liquidacion = Liquidacion::find($id);

        $IdNombre = $request->get('nombre');
        $idEmpleado = stristr( $IdNombre, "-", true );
        $nombreA = stristr( $IdNombre, "-", false );
        $nombreApellidos = substr($nombreA, 1);

        $IdMatricula = $request->get('matricula');
        $idVehiculo = stristr( $IdMatricula, "-", true );
        $matriculaConGuion = stristr( $IdMatricula, "-", false );
        $matricula = substr($matriculaConGuion, 1);

        $IdCodigoPostal = $request->get('codPostal');
        $idPostal = stristr($IdCodigoPostal, "-", true );
        $codigoPostalConGuion = stristr( $IdCodigoPostal, "-", false );
        $codPostal = substr($codigoPostalConGuion, 1);

        $liquidacion-> numRepartidor = $request->get('numRepartidor');
        $liquidacion-> nombre = $nombreApellidos;
        $liquidacion-> id_empleado = $idEmpleado;
        $liquidacion-> id_vehiculo = $idVehiculo;
        $liquidacion-> id_codigo_postal = $idPostal;
        $liquidacion-> matricula = $matricula;
        $liquidacion-> entregas = $request->get('entregas');
        $liquidacion-> recogidas = $request->get('recogidas');
        $liquidacion-> incidencias = $request->get('incidencias');
        $liquidacion-> diaTrabajado = $request->get('diaTrabajado');
        $liquidacion-> dinero = $request->get('dinero');
        $liquidacion-> fecha = $request->get('fecha');
        $liquidacion-> codPostal = $codPostal;
        $liquidacion-> registrado_por = auth()->user()->name;

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
