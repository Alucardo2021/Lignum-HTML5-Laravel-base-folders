<?php

namespace App\Http\Livewire;

use App\Models\Actor;
use Illuminate\Http\Request;
use Livewire\Component;

class ActoresDashboard extends Component
{
    public $actores;

    public $nombre;
    public $fecha;

    protected $listeners = ['actores-dashboard-borrar-actor' => 'borrarActor',
                            'actores-dashboard-render' => 'render',
                            'actores-dashboard-agregar-actor' => 'agregarActor',
                            'actores-dashboard-editar-actor' => 'editarActor'];


    public function render()
    {
        $this->actores = Actor::all();
        return view('livewire.actores-dashboard');
    }

    public function borrarActor($actorID){
        $actor = Actor::find($actorID);
        $actor->delete();

        $this->dispatchBrowserEvent('actorBorrado');
    }

}
