<?php

use App\Http\Controllers\PerfilController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CampanhasController;
use App\Http\Controllers\ResultadosController;
use App\Http\Controllers\SuporteController;
use App\Http\Controllers\ConfiguracoesUserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
})->name('home');

// Rota de login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Rotas protegidas por middleware de autenticação e verificação
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/campanhas', [CampanhasController::class, 'index'])->name('campanhas');
    Route::get('/resultados', [ResultadosController::class, 'index'])->name('resultados');
    Route::get('/suporte', [SuporteController::class, 'index'])->name('suporte');
    Route::get('/configuracoes', [ConfiguracoesUserController::class, 'index'])->name('configuracoes');
    
    Route::get('/perfil', [PerfilController::class, 'edit'])->name('perfil.edit');
    Route::patch('/perfil', [PerfilController::class, 'update'])->name('perfil.update');

    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/admin/manage-users', [AdminController::class, 'manageUsers'])->name('admin.manage-users');
        Route::post('/admin/store-user', [AdminController::class, 'store'])->name('admin.store-user');
        Route::get('/admin/edit-user/{user}', [AdminController::class, 'editUser'])->name('admin.edit-user');
        Route::patch('/admin/update-user/{user}', [AdminController::class, 'updateUser'])->name('admin.update-user');
        // Route::get('/perfil/store', [PerfilController::class, 'store'])->name('perfil.store');
        Route::delete('/admin/users/{user}', [AdminController::class, 'deleteUser'])->name('admin.delete-user');

    });
    
});
require __DIR__.'/auth.php';


//Route::get('/perfil', [PerfilController::class, 'store'])->name('perfil.store');