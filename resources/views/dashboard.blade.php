@extends('layouts.home')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-md-4 shadow p-3 mb-5 bg-white rounded conteudo" style="max-width: 300px;">
            <div class="text-center">
                <h1 class="titulo text-uppercase font-weight-bold">Dashboard</h1>
                <p class="descricao">Parabéns, você está logado no sistema de testes.</p>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-5">
                <div class="font-weight-bold text-center ">Olá {{ session('usuario') }}, seja bem-vindo(a) de volta!
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center row mt-4">
                <div class="col-auto w-100">
                    <a href="/alterarSenha"> <button class="btn btn-color w-100">Mudar
                            Senha</button></a>
                </div>

            </div>
            <div class="d-flex justify-content-center align-items-center row mt-4 mb-3">
                <a href="{{ route('usuario.login') }}">Sair</a>
            </div>
        </div>
    </div>
@endsection
