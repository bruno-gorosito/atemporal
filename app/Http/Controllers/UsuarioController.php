<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UsuarioController extends Controller
{
    //
    public function index(Request $request) {
        $usuarios = User::all();
        return Inertia::render('Usuario/ListadoUsuario', [
            'usuarios' => $usuarios
        ]);
    }

    public function eliminarUsuario(Request $request, $id) {
        $usuario = User::destroy($id);
        return response()->json([
            'usuario' => $usuario
        ]);
    }

    public function listadoRoles(Request $request) {
        return Inertia::render('Usuario/ListadoRol', [
            'roles' => ['kjslalsdj']
        ]);
    }
}
