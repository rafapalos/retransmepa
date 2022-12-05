<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Delegacion;

class DelegacionController extends Controller
{
    // Función para cuando aun no te has logueado, no se pueda acceder a las demás páginas.
    public function __construct(){
        $this->middleware('auth');
    }

    public function index() {
        $delegaciones = Delegacion::all();
        return view('delegacion.index')->with('delegaciones', $delegaciones);
    }

    // Función para añadir cliente
    public function create() {
        return view('delegacion.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nombreEmpresa' => 'required|unique:delegacions'
        ]);
        $delegaciones = new Delegacion();

        $delegaciones-> nombreEmpresa = $request->get('nombreEmpresa');
        $delegaciones-> localidad = $request->get('localidad');

        $delegaciones->save();

        return redirect('/delegaciones');
    }


    // Función para el botón de editar del dataTables
    public function edit($id) {
        $delegacion = Delegacion::find($id);
        return view('delegacion.edit')->with('delegacion',$delegacion);
    }

    public function update(Request $request, $id) {
        $delegacion = Delegacion::find($id);

        $delegacion-> nombreEmpresa = $request->get('nombreEmpresa');
        $delegacion-> localidad = $request->get('localidad');

        $delegacion->save();

        return redirect('/delegaciones');
    }

    // Función para el botón de eliminar del dataTables
    public function destroy($id) {
        $delegacion = Delegacion::find($id);
        $delegacion->delete();
        return redirect('/delegaciones');
    }
}
