<?php

namespace App\Http\Livewire;

use App\Models\Pelicula;
use Livewire\Component;
use Livewire\WithPagination;

class PeliculaVistaIndividual extends Component
{
    use WithPagination;

    public $peli;

    protected $paginationTheme = 'bootstrap';



    public function render()
    {
        return view('livewire.pelicula-vista-individual' , [
            'pelicula' => Pelicula::find($this->peli->PeliculaID)
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
