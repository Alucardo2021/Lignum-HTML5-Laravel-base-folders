<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PeliculaController extends Controller
{
    public function create(Request $request){

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

        return $this->getForPrintPelicula();
    }

    public function delete(Request $request){

        $validated = $request->validate([
            'PeliculaID' => 'required|exists:Pelicula,PeliculaID'
        ]);

        $PeliculaID = $validated['PeliculaID'] ?? null;

        $Pelicula = Pelicula::find($PeliculaID);
        $Pelicula->delete();

        return $this->getForPrintPelicula();
    }

    public function find(Request $request){

        $validated = $request->validate([
            'PeliculaID' => 'required|exists:Pelicula,PeliculaID'
        ]);

        $PeliculaID = $validated['PeliculaID'] ?? null;

        $Pelicula = Pelicula::find($PeliculaID);

        return response()->json($Pelicula);
    }

    public function edit(Request $request){

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
            Storage::disk('local')->delete($pelicula->Imagen);
            $pelicula->Imagen = asset("/storage/imagenesPeliculas/". $timestamp.".jpg");
        }


        $pelicula->update();

        return $this->getForPrintPelicula();
    }


    public function getForPrintPelicula(){
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

        return response()->json($peliculas);
    }
}
