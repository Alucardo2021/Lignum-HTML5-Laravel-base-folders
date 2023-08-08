<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\SuperUserController;
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

Route::get('/super', function () {
    return view('super',[
        'peliculas' => Pelicula::all(),
        'actores' => Actor::all()
    ]);
});


Route::post('/actor/create', [SuperUserController::class, 'createActor']);
Route::post('/actor/delete', [SuperUserController::class, 'deleteActor']);

Route::get('/actor/find', [SuperUserController::class, 'findActor']);
Route::post('/actor/edit', [SuperUserController::class, 'editActor']);




Route::post('/pelicula/create', [SuperUserController::class, 'createPelicula']);
Route::post('/pelicula/delete', [SuperUserController::class, 'deletePelicula']);



Route::get('/pelicula/find', [SuperUserController::class, 'findPelicula']);
Route::post('/pelicula/edit', [SuperUserController::class, 'editPelicula']);
