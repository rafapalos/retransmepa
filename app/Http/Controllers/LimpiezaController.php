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
        $empleadosLimpiezas = DB::select("SELECT id, nombre, apellidos FROM empleados WHERE estado = 'Activo' AND empresa = 'LavadosExpress' AND cargo = 'Limpiador'" );
        $clientesLimpiezas = DB::select("SELECT id, matricula FROM clientes");

        return view('limpieza.create', ['empleadosLimpiezas' => $empleadosLimpiezas, 'clientesLimpiezas' => $clientesLimpiezas]);
    }

    public function store(Request $request) {
        $limpiezas = new Limpieza();

        $IdEmpleadoAsignado = $request->get('empleadoAsignado');
        $idEmpleado = stristr($IdEmpleadoAsignado, "-", true );
        $nombreA = stristr($IdEmpleadoAsignado, "-", false );
        $nombreApellidos = substr($nombreA, 1);

        $IdMatriculaAsignada = $request->get('matricula');
        $idCliente = stristr($IdMatriculaAsignada, "-", true );
        $matricula1 = stristr($IdMatriculaAsignada, "-", false );
        $matricula = substr($matricula1, 1);

        $limpiezas-> matricula = $matricula;
        $limpiezas-> tipoLavado = $request->get('tipoLavado');
        $limpiezas-> tipoCoche = $request->get('tipoCoche');
        $limpiezas-> precio = $request->get('precio');
        $limpiezas-> fechaLimpieza = $request->get('fechaLimpieza');
        $limpiezas-> empleadoAsignado = $nombreApellidos;
        $limpiezas-> id_empleado = $idEmpleado;
        $limpiezas-> id_cliente = $idCliente;
        $limpiezas-> registrado_por = auth()->user()->name;

        $limpiezas->save();

        return redirect('/limpiezas');
    }

    // Función para el botón de editar del dataTables
    public function edit($id) {
        $empleadoEdit = DB::select("SELECT id, nombre, apellidos FROM empleados WHERE estado = 'Activo' AND empresa = 'LavadosExpress' AND cargo = 'Limpiador'");
        $clienteEdit = DB::select("SELECT id, matricula FROM clientes");

        $limpieza = Limpieza::find($id);
        return view('limpieza.edit', ['empleadoEdit' => $empleadoEdit, 'clienteEdit' => $clienteEdit])->with('limpieza',$limpieza);
    }

    public function update(Request $request, $id) {
        $limpieza = Limpieza::find($id);

        $IdEmpleadoAsignado = $request->get('empleadoAsignado');
        $idEmpleado = stristr( $IdEmpleadoAsignado, "-", true );
        $nombreA = stristr( $IdEmpleadoAsignado, "-", false );
        $nombreApellidos = substr($nombreA, 1);

        $IdMatriculaAsignada = $request->get('matricula');
        $idCliente = stristr($IdMatriculaAsignada, "-", true );
        $matricula1 = stristr($IdMatriculaAsignada, "-", false );
        $matricula = substr($matricula1, 1);

        $limpieza-> matricula = $matricula;
        $limpieza-> tipoLavado = $request->get('tipoLavado');
        $limpieza-> tipoCoche = $request->get('tipoCoche');
        $limpieza-> precio = $request->get('precio');
        $limpieza-> fechaLimpieza = $request->get('fechaLimpieza');
        $limpieza-> empleadoAsignado = $nombreApellidos;
        $limpieza-> id_empleado = $idEmpleado;
        $limpieza-> id_cliente = $idCliente;
        $limpieza-> registrado_por = auth()->user()->name;

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
