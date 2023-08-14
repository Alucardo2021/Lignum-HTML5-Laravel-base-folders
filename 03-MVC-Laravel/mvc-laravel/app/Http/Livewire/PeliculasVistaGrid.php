<?php

namespace App\Http\Livewire;

use App\Models\Pelicula;
use Livewire\Component;
use Livewire\WithPagination;

class PeliculasVistaGrid extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';


    public function render()
    {
        return view('livewire.peliculas-vista-grid', [
            'peliculas' => Pelicula::all()->toQuery()->orderByDesc('Favorito')->paginate(6)
        ]);
    }

    public function cambiarFavorito($PeliculaID){
        $pelicula = Pelicula::find($PeliculaID);
        if ($pelicula->Favorito == true) {
            $pelicula->Favorito = false;
        }else {
            $pelicula->Favorito = true;
        }

        $pelicula->update();
    }
}
