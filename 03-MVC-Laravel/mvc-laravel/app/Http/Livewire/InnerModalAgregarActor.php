<?php

namespace App\Http\Livewire;

use App\Models\Actor;
use Livewire\Component;

class InnerModalAgregarActor extends Component
{
    public $nombre;
    public $fecha;

    protected $rules = [
        'nombre' => 'required|min:3|max:50',
        'fecha' => 'required|before-or-equal:today'
    ];

    public function render()
    {
        return view('livewire.inner-modal-agregar-actor');
    }

    public function submit()
    {
        $this->validate();

        $actor = new Actor();
        $actor->Nombre = $this->nombre;
        $actor->FechaNacimiento = $this->fecha;
        $actor->save();
        $this->emit('actores-dashboard-render');
        $this->dispatchBrowserEvent('actorAgregado');
    }

    public function clearNombre(){
        $this->nombre = null;
        $this->dispatchBrowserEvent('clearNombreAgregar');
    }

    public function clearFecha(){
        $this->fecha = null;
        $this->dispatchBrowserEvent('clearFechaAgregar');
    }
}
