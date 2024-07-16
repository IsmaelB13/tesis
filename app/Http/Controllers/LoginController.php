<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Método para mostrar la vista de inicio de sesión
    public function showLoginForm()
    {
        return view('admin.inicio_sesion');
    }

    // Método para manejar el inicio de sesión
    public function login(Request $request)
    {
        // Validación de los datos de inicio de sesión
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Intento de autenticación
        if (Auth::attempt($credentials)) {
            // Autenticación exitosa, redireccionar según el rol del usuario
            if (Auth::user()->usertype == 'user') {
                return redirect()->route('home.index');
            } elseif (Auth::user()->usertype == 'admin') {
                return redirect()->route('admin.index');
            } elseif (Auth::user()->usertype == 'conductor') {
                return redirect()->route('conductor.index');
            }
        }

        // Autenticación fallida, redirigir de nuevo al formulario de inicio de sesión con un mensaje de error
        return redirect()->back()->withErrors([
            'email' => 'Las credenciales proporcionadas no son válidas.',
        ]);
    }
}
