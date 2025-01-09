<?php

use App\Http\Controllers\Payment\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    $saludo = "Hola perro salvaje";
    return Inertia::render('Home');
})->name('home');
Route::get('/create_preference', [PaymentController::class, 'createPreference']);


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    
    Route::prefix('usuarios')->group(function() {
        Route::get('/listado', [UsuarioController::class, 'index'])->name('usuarios.listado');
        Route::delete('/{id}', [UsuarioController::class, 'eliminarUsuario'])->name('usuarios.eliminar');
    });
    Route::prefix('roles')->group(function() {
        Route::get('/listado', [UsuarioController::class, 'listadoRoles'])->name('roles.listado');
        Route::delete('/{id}', [UsuarioController::class, 'eliminarRol'])->name('roles.eliminar');
    });
});





require __DIR__ . '/auth.php';
