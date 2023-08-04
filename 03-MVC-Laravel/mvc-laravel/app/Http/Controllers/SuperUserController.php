<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Pelicula;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuperUserController extends Controller
{

    public function createActor(Request $request){

        $validated = $request->validate([
            'nombre' => 'required|max:50|min:3',
            'fecha' => 'required|before:'.\Carbon\Carbon::tomorrow()->format('Y-m-d')
        ]);

        $actor = new Actor();

        $actor->Nombre = $validated['nombre'] ?? null;
        $actor->FechaNacimiento = $validated['fecha'] ?? null;
        $actor->save();

        return $this->getForPrintActores();
    }

    public function deleteActor(Request $request){

        $validated = $request->validate([
            'ActorID' => 'required|exists:Actor,ActorID'
        ]);

        $ActorID = $validated['ActorID'] ?? null;

        $Actor = Actor::find($ActorID);
        $Actor->delete();

        return $this->getForPrintActores();
    }

    public function findActor(Request $request){

        $validated = $request->validate([
            'ActorID' => 'required|exists:Actor,ActorID'
        ]);

        $ActorID = $validated['ActorID'] ?? null;

        $Actor = Actor::find($ActorID);

        return response()->json($Actor);
    }

    public function editActor(Request $request){

        $validated = $request->validate([
            'ActorID' => 'required|exists:Actor,ActorID',
            'nombre' => 'required|max:50|min:3',
            'fecha' => 'required|before:'.\Carbon\Carbon::tomorrow()->format('Y-m-d')
        ]);

        $ActorID = $validated['ActorID'] ?? null;
        $actor = Actor::find($ActorID);

        $actor->Nombre = $validated['nombre'] ?? null;
        $actor->FechaNacimiento = $validated['fecha'] ?? null;
        $actor->update();

        return $this->getForPrintActores();
    }

    public function getForPrintActores(){
        $actores = new Collection();

        foreach (Actor::all() as $a) {
            $act = $a;
            $act->PeliculasCount = $a->Peliculas()->count();
            $actores->add($act);
        }

        return response()->json($actores);
    }


    //PELICULAS

    public function createPelicula(Request $request){

        $validated = $request->validate([
            'titulo' => 'nullable'/* 'required|max:30|min:1' */,
            'año' => 'nullable'/* 'required|max:'.\Carbon\Carbon::today()->format('Y').'|min:1895' */,
            'actor' => 'nullable'/* 'required|exists:Actor,ActorID' */,
            'sinopsis' => 'nullable'/* 'required|max:500|min:3' */ ,
            'duracion' => 'nullable'/* 'required|max:600|min:1' */ ,
            'imagen' => 'nullable'/* 'required' */
        ]);

        $pelicula = new Pelicula();

        dd($validated);

        Storage::disk('local')->put('public/imagenesPeliculas/asd.jpg', file_get_contents($validated['imagen']));

/*         let duracion = parseInt($('#duracionPeliculaAgregar').val()/60)+":"+($('#duracionPeliculaAgregar').val()-((parseInt($('#duracionPeliculaAgregar').val()/60))*60))+":00" ;*/        $actor = new Actor();

        /* $actor->Nombre = $validated['nombre'] ?? null;
        $actor->FechaNacimiento = $validated['fecha'] ?? null;
        $actor->save(); */

        /* return $this->getForPrintPeliculas(); */

        return 1;
    }

    public function deletePelicula(Request $request){

        $validated = $request->validate([
            'ActorID' => 'required|exists:Actor,ActorID'
        ]);

        $ActorID = $validated['ActorID'] ?? null;

        $Actor = Actor::find($ActorID);
        $Actor->delete();

        return $this->getForPrintPeliculas();
    }

    public function findPelicula(Request $request){

        $validated = $request->validate([
            'ActorID' => 'required|exists:Actor,ActorID'
        ]);

        $ActorID = $validated['ActorID'] ?? null;

        $Actor = Actor::find($ActorID);

        return response()->json($Actor);
    }

    public function editPelicula(Request $request){

        $validated = $request->validate([
            'ActorID' => 'required|exists:Actor,ActorID',
            'nombre' => 'required|max:50|min:3',
            'fecha' => 'required|before:'.\Carbon\Carbon::tomorrow()->format('Y-m-d')
        ]);

        $ActorID = $validated['ActorID'] ?? null;
        $actor = Actor::find($ActorID);

        $actor->Nombre = $validated['nombre'] ?? null;
        $actor->FechaNacimiento = $validated['fecha'] ?? null;
        $actor->update();

        return $this->getForPrintPeliculas();
    }

    public function getForPrintPeliculas(){
        $actores = new Collection();

        foreach (Actor::all() as $a) {
            $act = $a;
            $act->PeliculasCount = $a->Peliculas()->count();
            $actores->add($act);
        }

        return response()->json($actores);
    }
}
