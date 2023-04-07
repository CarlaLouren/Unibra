<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function viewLoginForm()
    {
        return view('login');
    }

    public function login(Request $request, Usuario $usuario)
    {
        $credentials = $request->validate([
            'cpf' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);
        $usuario = $usuario->where('cpf', $credentials['cpf'])->first();

        $cpf = $request->input('cpf');
        $senha = $request->input('password');

        if (!$usuario) {
            return redirect()->back()->withErrors([
                'cpf' => 'CPF e/ou senha incorretos.',
            ]);
        }

        unset($usuario->password);
        session()->put('usuario', $usuario->nome_completo);

        return redirect('/dashboard');
    }
}
