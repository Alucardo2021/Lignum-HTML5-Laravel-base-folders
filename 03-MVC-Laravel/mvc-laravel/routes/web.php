<?php

use App\Http\Controllers\ActorController;
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

Route::get('/', function () {
    return view('index',[
        'peliculas' => Pelicula::all(),
        'actores' => Actor::all()
    ]);
});


Route::post('/create/actor', [ActorController::class, 'create']);

Route::get('%all/actor', [ActorController::class, 'getAllActores']);
