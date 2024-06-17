<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\CampanhasController;
use App\Http\Controllers\ResultadosController;
use App\Http\Controllers\SuporteController;
use App\Http\Controllers\ConfiguracoesUserController;

Route::get('/dashboard', [DashBoardController::class, 'index'])->name('dashboard');
Route::get('/campanhas', [CampanhasController::class, 'index'])->name('campanhas');
Route::get('/resultados', [ResultadosController::class, 'index'])->name('resultados');
Route::get('/suporte', [SuporteController::class, 'index'])->name('suporte');
Route::get('/configuracoes', [ConfiguracoesUserController::class, 'index'])->name('configuracoes');


Route::get('/', function () {
    return redirect()->route('dashboard');
})->name('master');
