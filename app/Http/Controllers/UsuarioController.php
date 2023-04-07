<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Str;

class UsuarioController extends Controller
{
    public function index()
    {
        return view('cadastro');
    }

    public function viewCadastro()
    {
        return view('cadastro');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function recuperarSenha()
    {
        return view('recovery');
    }

    public function viewAlterarSenha()
    {
        return view('update');
    }

    public function store(Request $request, Usuario $usuario)
    {
        $messages = [
            'cpf.required' => 'O CPF é obrigatório',
            'cpf.max' => 'O CPF deve conter no máximo :max caracteres',
            'cpf.unique' => 'Já existe um usuário cadastrado com esse CPF'
        ];

        $request->validate([
            'nome_completo' => 'required|string|max:255',
            'cpf' => 'required|string|max:14|unique:usuarios',
            'email' => 'required|email|unique:usuarios|max:255',
            'password' => 'required|string|min:3|max:10'
        ], $messages);

        $data = $request->all();
        $usuario = $usuario->create($data);
        return redirect()->route('usuario.dashboard')->with('success', 'Usuário criado com sucesso');
    }

    public function recoveryPassword(Request $request, Usuario $usuario)
    {

        $rules = [
            'cpf' => 'required',
        ];

        $messages = [
            'cpf.required' => 'O campo CPF é obrigatório',
            'cpf' => 'O CPF informado é inválido',
        ];

        $cpfValidate = $request->validate($rules, $messages);

        $usuario = $usuario->where('cpf', $cpfValidate['cpf'])->first();

        if (!$usuario) {
            return back()->withErrors(['cpf' => 'Não foi encontrado nenhum usuário com esse CPF']);
        }
        return back()->with('success', 'Recuperação de senha foi enviado.');
    }

    public function recuperaSenha(Request $request)
    {
        $request->validate([
            'cpf' => 'required|cpf',
        ]);

        $usuario = Usuario::where('cpf', $request->cpf)->first();

        if (!$usuario) {
            return redirect()->back()->withErrors(['cpf' => 'CPF não encontrado']);
        }
        // logica do email

        return back()->with('success', 'Recuperação email foi enviado.');
    }

    public function alterarSenha(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ], [
            'password.confirmed' => 'As senhas informadas não coincidem.',
        ]);

        $usuario = Session::get('usuario');

        $usuario['password'] = Hash::make($request->password);

        Session::put('usuario', $usuario);

        return redirect()->route('home')->with('success', 'Senha alterada com sucesso!');
    }
}
