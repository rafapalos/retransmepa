<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class EmpleadoController extends Controller
{
    // Función para cuando aun no te has logueado, no se pueda acceder a las demás páginas.
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $empleados = Empleado::all();
        return view('empleado.index')->with('empleados', $empleados);
    }

    // Función para añadir empleado
    public function create() {
        return view('empleado.create');
    }

    public function store(Request $request) {
        $request->validate([
            'id'  => 'required|unique:empleados',
            'dni' => 'required|unique:empleados'
        ]);

        $empleados = new Empleado();

        $empleados-> id = $request->get('id');
        $empleados-> nombre = $request->get('nombre');
        $empleados-> apellidos = $request->get('apellidos');
        $empleados-> dni = $request->get('dni');
        $empleados-> fechaNacimiento = $request->get('fechaNacimiento');
        $empleados-> estado = $request->get('estado');
        $empleados-> empresa = $request->get('empresa');
        $empleados-> cargo = $request->get('cargo');

        $empleados->save();

        return redirect('/empleados');
    }

    // Función para el botón de editar del dataTables
    public function edit($id) {
        $empleado = Empleado::find($id);
        return view('empleado.edit')->with('empleado',$empleado);
    }

    public function update(Request $request, $id) {
        $empleado = Empleado::find($id);

        $empleado-> id = $request->get('id');
        $empleado-> nombre = $request->get('nombre');
        $empleado-> apellidos = $request->get('apellidos');
        $empleado-> dni = $request->get('dni');
        $empleado-> fechaNacimiento = $request->get('fechaNacimiento');
        $empleado-> estado = $request->get('estado');
        $empleado-> empresa = $request->get('empresa');
        $empleado-> cargo = $request->get('cargo');

        $empleado->save();

        return redirect('/empleados');
    }

    // Función para el botón de eliminar del dataTables
    public function destroy($id) {
        $empleado = Empleado::find($id);
        $empleado->delete();
        return redirect('/empleados');
    }
}
