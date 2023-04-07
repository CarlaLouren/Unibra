<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'viewLoginForm'])->name('usuario.viewLoginForm');
Route::post('/login', [LoginController::class, 'login'])->name('usuario.login');

Route::get('/alterarSenha', [UsuarioController::class, 'viewAlterarSenha'])->name('usuario.viewAlterarSenha');
Route::post('/alterarSenha', [UsuarioController::class, 'alterarSenha'])->name('usuario.alteraSenha');

Route::get('/recuperar', [UsuarioController::class, 'recuperarSenha'])->name('recuperarSenha');
Route::post('/recuperar', [UsuarioController::class, 'recoveryPassword'])->name('usuario.recuperar');

Route::get('/dashboard', [UsuarioController::class, 'dashboard'])->name('usuario.dashboard');
Route::get('/cadastro', [UsuarioController::class, 'viewCadastro'])->name('cadastro');
Route::post('/cadastro', [UsuarioController::class, 'store'])->name('usuario.store');
