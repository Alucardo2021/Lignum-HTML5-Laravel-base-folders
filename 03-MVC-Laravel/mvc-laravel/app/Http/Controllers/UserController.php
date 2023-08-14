<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function indexPeliculas(){
        return view('user.peliculas',[
            'peliculas' => Pelicula::all(),
        ]);
    }

    public function verPelicula($id){
        return view('user.pelicula',[
            'peliculas' => Pelicula::all(),
            'pelicula' => Pelicula::find($id)
        ]);
    }

    public function obtenerPeliculas(){
        return response()->json(Pelicula::all());
    }

    public function indexPeliculasFavoritas(){
        return view('user.peliculas-favoritas',[
            'peliculas' => Pelicula::where('Favorito',true)->get()
        ]);
    }



    public function marcarFavorito(Request $request){

        $validated = $request->validate([
            'PeliculaID' => 'required|exists:Pelicula,PeliculaID',
            'Fav' => 'required|integer'
        ]);

        $PeliculaID = $validated['PeliculaID'] ?? null;
        $Fav = $validated['Fav'] ?? null;

        $Pelicula = Pelicula::find($PeliculaID);

        if ($Fav == 0) {
            $Pelicula->Favorito = 1;
        } else {
            $Pelicula->Favorito = 0;
        }

        $Pelicula->update();

        return response()->json($Pelicula);
    }

}
