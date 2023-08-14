<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\SuperUserController;
use App\Http\Controllers\UserController;
use App\Models\Actor;
use App\Models\Pelicula;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


/* Route::get('/', function () {
    return view('index',[
        'peliculas' => Pelicula::all(),
        'actores' => Actor::all()
    ]);
}); */


Route::get('/user/peliculas',[UserController::class, 'indexPeliculas']);
Route::get('/user/peliculas/favoritas',[UserController::class, 'indexPeliculasFavoritas']);

Route::get('/user/pelicula/{id}',[UserController::class, 'verPelicula']);
Route::get('/user/peliculas/get',[UserController::class, 'obtenerPeliculas']);


Route::get('/super/actores', [SuperUserController::class, 'indexAdminActores']);
Route::get('/super/peliculas', [SuperUserController::class, 'indexAdminPeliculas']);


Route::post('super/peliculas/create', [PeliculaController::class, 'create']);
Route::post('super/peliculas/delete', [PeliculaController::class, 'delete']);
Route::get('super/peliculas/find', [PeliculaController::class, 'find']);
Route::post('super/peliculas/edit', [PeliculaController::class, 'edit']);
