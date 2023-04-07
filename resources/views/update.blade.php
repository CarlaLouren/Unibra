@extends('layouts.home')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="row shadow p-3 mb-5 bg-white rounded conteudo-update conteudo">
            <div class="titulo col-auto mt-2">
                <h1 class="text-uppercase font-weight-bold titulo">Alterar Senha</h1>
                <p class="descricao">Informe abaixo sua nova senha</p>
            </div>

            <form action="{{ route('usuario.alteraSenha') }}" method="POST">
                @csrf
                <div class="input-group d-flex justify-content-center align-items-center">
                    <div class="input-box col-auto">
                        <label for="" class="form-label text-uppercase font-weight-bold mt-2">Nova
                            Senha</label>
                        <input type="password" class="form-control input-update" name="passaword">
                    </div>
                    <div class="input-box col-auto">
                        <label for="" class="form-label text-uppercase font-weight-bold mt-3">Confirme a
                            nova senha</label>
                        <input type="password" class="form-control input-update" name="password_confirmation">
                    </div>
                </div>
                <div class="botao-container d-flex justify-content-center align-items-center">
                    <button class="btn btn-color mb-5 mt-3" type="submit">Atualizar senha</button>
                </div>
            </form>
        </div>
    </div>
@endsection
