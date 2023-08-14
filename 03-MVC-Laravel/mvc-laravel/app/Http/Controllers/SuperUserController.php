<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Pelicula;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuperUserController extends Controller
{
    public function indexAdminActores(){
        return view('super.actores',[
            'actores' => Actor::all(),
            'pagina' => 1
        ]);
    }

    public function indexAdminPeliculas(){
        return view('super.peliculas',[
            'actores' => Actor::all(),
            'peliculas' => Pelicula::all(),
            'pagina' => 2
        ]);
    }

}





