@extends('layouts.home')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-md-4 container-img">
            <div class="row">
                <img src="{{ asset('img/unibra-logo.png') }}" alt="">
            </div>
        </div>

        <div class="col-md-4 shadow p-3 mb-5 conteudo conteudo-cadastro bg-white">
            <div class="text-center">
                <h1 class="text-uppercase font-weight-bold titulo">Cadastro</h1>
                <p class="descricao">Informe os dados abaixo para se cadastrar no sistema.</p>
            </div>
            <form action="{{ route('usuario.store') }}" method="POST">
                @csrf()
                <div class="form-group">
                    <label for="nome_completo" class="form-label text-uppercase font-weight-bold">Nome Completo</label>
                    <input type="text" class="form-control input-color" id="nome_completo" name="nome_completo" required>
                </div>
                <div class="form-group">
                    <label for="cpf" class="form-label text-uppercase font-weight-bold">CPF</label>
                    <input type="text" class="form-control input-color" id="cpf" name="cpf" required
                        value="{{ old('cpf') }}">
                    @error('cpf')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email" class="form-label text-uppercase font-weight-bold">Email</label>
                    <input type="email" class="form-control input-color" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password" class="form-label text-uppercase font-weight-bold">Senha</label>
                    <input type="password" class="form-control input-color" id="password" name="password" required>
                </div>
                <div class="form-group d-flex justify-content-center">
                    <button class="btn btn-color w-100" type="submit">Cadastrar</button>
                </div>
            </form>
            <div class="row d-flex justify-content-center">
                <a href="/">Voltar</a>
            </div>
        </div>
    </div>
@endsection
