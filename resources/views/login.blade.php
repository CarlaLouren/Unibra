@extends('layouts.home')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-md-4 shadow p-3 mb-5 bg-white rounded conteudo" style="max-width: 300px;">
            <div class="text-center">
                <h1 class="text-uppercase font-weight-bold titulo">Autenticação</h1>
                <p class="descricao text-wrap text-justify">Informe abaixo seu CPF e Senha para fazer login no sistema da
                    unibra.</p>
            </div>
            <form action="{{ route('usuario.login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="cpf" class="text-uppercase font-weight-bold">CPF</label>
                    <input type="text" class="form-control input-autentificacao" id="cpf" name="cpf" required
                        value="{{ old('cpf') }}">
                    @error('cpf')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password" class="text-uppercase font-weight-bold">Senha</label>
                    <input type="password" class="form-control input-autentificacao" id="password" name="password">
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn  btn-block btn-color">Entrar</button>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <a class="recuperar" href="/">Recuperar minha senha</a>
                </div>
            </form>
        </div>
    </div>
@endsection
