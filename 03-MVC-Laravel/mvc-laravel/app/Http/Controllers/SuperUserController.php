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

    public function createActor(Request $request){

        $validated = $request->validate([
            'nombre' => 'required|max:50|min:3',
            'fecha' => 'required|before:'.\Carbon\Carbon::tomorrow()->format('Y-m-d')
        ]);

        $actor = new Actor();

        $actor->Nombre = $validated['nombre'] ?? null;
        $actor->FechaNacimiento = $validated['fecha'] ?? null;
        $actor->save();

        return $this->getForPrint();
    }

    public function deleteActor(Request $request){

        $validated = $request->validate([
            'ActorID' => 'required|exists:Actor,ActorID'
        ]);

        $ActorID = $validated['ActorID'] ?? null;

        $Actor = Actor::find($ActorID);
        $Actor->delete();

        return $this->getForPrint();
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

        return $this->getForPrint();
    }



    //PELICULAS

    public function createPelicula(Request $request){

        //arreglar
        if($request['año']< 1895 || $request['año'] > Carbon::now()->format('Y')){
            $request['año'] = null;
        }
        if($request['duracion']< 1 || $request['duracion'] > 600){
            $request['duracion'] = null;
        }
        //fin arreglar

        $validated = $request->validate([
            'titulo' => 'required|max:30|min:1',
            'año' => 'required',
            'actor' => 'required|exists:Actor,ActorID',
            'sinopsis' => 'required|max:500|min:3',
            'duracion' => 'required|between:1,600',
            'imagen' => 'required|file'
        ]);



        $pelicula = new Pelicula();

        $pelicula->Titulo = $validated['titulo'] ?? null;
        $pelicula->Año = $validated['año'] ?? null;
        $pelicula->ActorPrincipalID = $validated['actor'] ?? null;
        $pelicula->Sinopsis = $validated['sinopsis'] ?? null;

        $pelicula->Duracion = $validated['duracion'] ?? null;


        $imagen = $validated['imagen'] ?? null;
        $timestamp = Carbon::now()->getTimestampMs();
        Storage::disk('local')->put('public/imagenesPeliculas/'.$timestamp.'.jpg', file_get_contents($imagen));
        $pelicula->Imagen = asset("/storage/imagenesPeliculas/". $timestamp.".jpg");

        $pelicula->save();

        return $this->getForPrint();
    }

    public function deletePelicula(Request $request){

        $validated = $request->validate([
            'PeliculaID' => 'required|exists:Pelicula,PeliculaID'
        ]);

        $PeliculaID = $validated['PeliculaID'] ?? null;

        $Pelicula = Pelicula::find($PeliculaID);
        $Pelicula->delete();

        return $this->getForPrint();
    }

    public function findPelicula(Request $request){

        $validated = $request->validate([
            'PeliculaID' => 'required|exists:Pelicula,PeliculaID'
        ]);

        $PeliculaID = $validated['PeliculaID'] ?? null;

        $Pelicula = Pelicula::find($PeliculaID);

        return response()->json($Pelicula);
    }

    public function editPelicula(Request $request){

        //arreglar
        if($request['año']< 1895 || $request['año'] > Carbon::now()->format('Y')){
            $request['año'] = null;
        }
        if($request['duracion']< 1 || $request['duracion'] > 600){
            $request['duracion'] = null;
        }
        //fin arreglar

        $validated = $request->validate([
            'titulo' => 'required|max:30|min:1',
            'año' => 'required',
            'actor' => 'required|exists:Actor,ActorID',
            'sinopsis' => 'required|max:500|min:3',
            'duracion' => 'required|between:1,600',
            'imagen' => 'required',
            'PeliculaID' => 'required|exists:Pelicula,PeliculaID',
            'bandera' => 'required'
        ]);

        $PeliculaID = $validated['PeliculaID'] ?? null;

        $pelicula = Pelicula::find($PeliculaID);

        $pelicula->Titulo = $validated['titulo'] ?? null;
        $pelicula->Año = $validated['año'] ?? null;
        $pelicula->ActorPrincipalID = $validated['actor'] ?? null;
        $pelicula->Sinopsis = $validated['sinopsis'] ?? null;

        $pelicula->Duracion = $validated['duracion'] ?? null;


        $bandera = $validated['bandera'] ?? null;

        if ($bandera == 0) {
            $imagen = $validated['imagen'] ?? null;
            $timestamp = Carbon::now()->getTimestampMs();
            Storage::disk('local')->put('public/imagenesPeliculas/'.$timestamp.'.jpg', file_get_contents($imagen));
            $pelicula->Imagen = asset("/storage/imagenesPeliculas/". $timestamp.".jpg");
        }


        $pelicula->update();

        return $this->getForPrint();
    }








    public function getForPrint(){
        $actores = new Collection();

        foreach (Actor::all() as $a) {
            $act = $a;
            $act->PeliculasCount = $a->Peliculas()->count();
            $actores->add($act);
        }

        $peliculas = new Collection();

        foreach (Pelicula::all() as $p) {
            $peli = $p;
            if ($p->ActorPrincipal) {
                $peli->NombreActor = $p->ActorPrincipal->Nombre;
            }else{
                $peli->NombreActor = "Actor Principal Eliminado";
            }
            $peliculas->add($peli);
        }

        return response()->json([$actores,$peliculas]);
    }
}
