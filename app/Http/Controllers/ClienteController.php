<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller {
    // Función para cuando aun no te has logueado, no se pueda acceder a las demás páginas.
    public function __construct(){
        $this->middleware('auth');
    }

    public function index() {
        $clientes = Cliente::all();
        return view('cliente.index')->with('clientes', $clientes);
    }

    // Función para añadir cliente
    public function create() {
        return view('cliente.create');
    }

    public function store(Request $request) {
        $request->validate([
            'matricula' => 'required|unique:clientes'
        ]);
        $clientes = new Cliente();

        $clientes-> nombreCliente = $request->get('nombreCliente');
        $clientes-> matricula = $request->get('matricula');
        $clientes-> marca = $request->get('marca');
        $clientes-> modelo = $request->get('modelo');

        $clientes->save();

        return redirect('/clientes');
    }


    // Función para el botón de editar del dataTables
    public function edit($id) {
        $cliente = Cliente::find($id);
        return view('cliente.edit')->with('cliente',$cliente);
    }

    public function update(Request $request, $id) {
        $cliente = Cliente::find($id);

        $cliente-> nombreCliente = $request->get('nombreCliente');
        $cliente-> matricula = $request->get('matricula');
        $cliente-> marca = $request->get('marca');
        $cliente-> modelo = $request->get('modelo');

        $cliente->save();

        return redirect('/clientes');
    }

    // Función para el botón de eliminar del dataTables
    public function destroy($id) {
        $cliente = Cliente::find($id);
        $cliente->delete();
        return redirect('/clientes');
    }
}
