<?php
use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::resource('/login', UsuarioController::class);


// Nueva ruta para verificar el email
Route::get('/login/{email}', [UsuarioController::class, 'verificaemail']);

// Nueva ruta para verificar la clave
Route::get('/login/{email}/{clave}', [UsuarioController::class, 'verificaclave']);
