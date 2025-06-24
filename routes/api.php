<?php

use App\Http\Controllers\Api\AnimalController;
use App\Http\Controllers\Api\SolicitudAdopcionController;
use App\Http\Controllers\Api\CitasVacunacionController;
use App\Http\Controllers\Api\NoticiaController;
use App\Http\Controllers\Api\EventoController;
use App\Http\Controllers\Api\ComentarioController;
use App\Http\Controllers\Api\CalificacionController;
use App\Http\Controllers\Api\UsuarioController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

// Rutas públicas
Route::post('login', [LoginController::class, 'login']);

// Animales pueden ser vistos por todos (sin auth)
Route::get('animals', [AnimalController::class, 'index']);
Route::get('animals/{id}', [AnimalController::class, 'show']);

// Noticias públicas
Route::get('noticias', [NoticiaController::class, 'index']);
Route::get('noticias/{id}', [NoticiaController::class, 'show']);

// Eventos públicos
Route::get('eventos', [EventoController::class, 'index']);
Route::get('eventos/{id}', [EventoController::class, 'show']);

// Comentarios públicos (quizás solo lectura)
Route::get('comentarios', [ComentarioController::class, 'index']);
Route::get('comentarios/{id}', [ComentarioController::class, 'show']);

// Rutas protegidas (requieren autenticación)
Route::middleware('auth:api')->group(function () {

    // Rutas para usuarios tipo administrador
    Route::middleware('roles:administrador')->group(function () {
        Route::apiResource('usuarios', UsuarioController::class);

        // CRUD animales (solo admin puede crear/editar/eliminar)
        Route::post('animals', [AnimalController::class, 'store']);
        Route::put('animals/{id}', [AnimalController::class, 'update']);
        Route::delete('animals/{id}', [AnimalController::class, 'destroy']);

        // CRUD noticias
        Route::post('noticias', [NoticiaController::class, 'store']);
        Route::put('noticias/{id}', [NoticiaController::class, 'update']);
        Route::delete('noticias/{id}', [NoticiaController::class, 'destroy']);

        // CRUD eventos
        Route::post('eventos', [EventoController::class, 'store']);
        Route::put('eventos/{id}', [EventoController::class, 'update']);
        Route::delete('eventos/{id}', [EventoController::class, 'destroy']);
    });
    // Solicitudes de adopción (crear y ver)
    Route::get('solicitudes', [SolicitudAdopcionController::class, 'index']);
    Route::get('solicitudes/{id}', [SolicitudAdopcionController::class, 'show']);
    Route::post('solicitudes', [SolicitudAdopcionController::class, 'store']);
    Route::put('solicitudes/{id}', [SolicitudAdopcionController::class, 'update']);
    Route::delete('solicitudes/{id}', [SolicitudAdopcionController::class, 'destroy']);

    // Citas de vacunación
    Route::get('citas', [CitasVacunacionController::class, 'index']);
    Route::get('citas/{id}', [CitasVacunacionController::class, 'show']);
    Route::post('citas', [CitasVacunacionController::class, 'store']);
    Route::put('citas/{id}', [CitasVacunacionController::class, 'update']);
    Route::delete('citas/{id}', [CitasVacunacionController::class, 'destroy']);

    // Comentarios (crear, editar, eliminar)
    Route::post('comentarios', [ComentarioController::class, 'store']);
    Route::put('comentarios/{id}', [ComentarioController::class, 'update']);
    Route::delete('comentarios/{id}', [ComentarioController::class, 'destroy']);

    // Calificaciones
    Route::get('calificaciones', [CalificacionController::class, 'index']);
    Route::get('calificaciones/{id}', [CalificacionController::class, 'show']);
    Route::post('calificaciones', [CalificacionController::class, 'store']);
    Route::put('calificaciones/{id}', [CalificacionController::class, 'update']);
    Route::delete('calificaciones/{id}', [CalificacionController::class, 'destroy']);
});
