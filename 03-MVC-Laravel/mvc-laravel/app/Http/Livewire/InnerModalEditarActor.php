<?php

namespace App\Http\Livewire;

use App\Models\Actor;
use Illuminate\Support\Js;
use Livewire\Component;

class InnerModalEditarActor extends Component
{
    public $actorID;
    public $nombre;
    public $fecha;

    protected $listeners =['inner-modal-set-actor-actorID' => 'setActorID'];

    protected $rules = [
        'nombre' => 'required|min:3|max:50',
        'fecha' => 'required|before-or-equal:today'
    ];

    public function render()
    {

        return view('livewire.inner-modal-editar-actor');
    }

    public function submit()
    {
        $this->validate();

        $actor =Actor::find($this->actorID);
        $actor->Nombre = $this->nombre;
        $actor->FechaNacimiento = $this->fecha;
        $actor->save();
        $this->emit('actores-dashboard-render');
        $this->dispatchBrowserEvent('actorEditado');
    }

    public function setActorID($ID)
    {
        $this->actorID = $ID;

        $actor = Actor::find($this->actorID);
        $this->nombre = $actor->Nombre;
        $this->fecha = $actor->FechaNacimiento;
    }

    public function clearNombreEditar(){
        $this->nombre = null;
        $this->dispatchBrowserEvent('clearNombreEditar');
    }

    public function clearFechaEditar(){
        $this->fecha = null;
        $this->dispatchBrowserEvent('clearFechaEditar');
    }
}
