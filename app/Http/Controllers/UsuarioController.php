<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsuarioController extends Controller {
        // Función para cuando aun no te has logueado, no se pueda acceder a las demás páginas.
        public function __construct(){
            $this->middleware('auth');
        }
    
        public function index()
        {
            $usuarios = User::all();

            return view('usuario.index')->with('usuarios', $usuarios);
        }
    
        // Función para añadir usuario
        public function create()
        {
            return view('usuario.create');
        }
    
        public function store(Request $request)
        {
            $usuarios = new User();
            
            // $usuarios-> id = $request->get('id');
            $usuarios-> name = $request->get('name');
            $usuarios-> email = $request->get('email');
            $usuarios-> email_verified_at = $request->get('email_verified_at');
            $usuarios-> password = $request->get('password');
            $usuarios-> two_factor_secret = $request->get('two_factor_secret');
            $usuarios->save();
    
            return redirect('/usuarios');
        }
    
        public function show($id)
        {
            //
        }
    
        // Función para el botón de editar del dataTables
        public function edit($id)
        {
            $usuario = User::find($id);
            return view('usuario.edit')->with('usuario',$usuario);
        }
    
        public function update(Request $request, $id)
        {
            $usuario = User::find($id);

            $usuario-> name = $request->get('name');
            $usuario-> email = $request->get('email');
            $usuario-> email_verified_at = $request->get('email_verified_at'); 
            $usuario-> password = $request->get('password');
            $usuario-> two_factor_secret = $request->get('two_factor_secret');

            $usuario->save();
    
            return redirect('/usuarios');
        }
    
        // Función para el botón de eliminar del dataTables
        public function destroy($id)
        {
            $usuario = User::find($id);
            $usuario->delete();
            return redirect('/usuarios');
        }
}
