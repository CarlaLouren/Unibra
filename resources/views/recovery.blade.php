@extends('layouts.home')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="row shadow p-3 mb-5 bg-white rounded conteudo-recuperar">
            <div class="titulo col-12 text-center">
                <h1 class="text-uppercase font-weight-bold titulo">Recuperar Senha</h1>
                <p class="descricao">Informe abaixo seu CPF e Senha para recuperar sua senha, enviaremos um link para o email
                    cadastrado.</p>
            </div>
            <form action="{{ route('usuario.recuperar') }}" method="POST" style="width: 100%;">
                @csrf()

                <div class="form-group">
                    <label for="cpf" class="form-label text-uppercase font-weight-bold">CPF</label>
                    <input type="text" class="form-control" name="cpf" id="cpf" required
                        value="{{ old('cpf') }}">
                    @error('cpf')
                        <div>{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-center">
                    <button class="btn btn-color btn-block">Enviar</button>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <a class="recuperar" href="/">Voltar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
