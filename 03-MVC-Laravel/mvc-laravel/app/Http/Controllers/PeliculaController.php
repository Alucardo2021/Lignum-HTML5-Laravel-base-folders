<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    /* public function create(Request $request){

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

    public function delete(Request $request){

        $validated = $request->validate([
            'ActorID' => 'required|exists:Actor,ActorID'
        ]);

        $ActorID = $validated['ActorID'] ?? null;

        $Actor = Actor::find($ActorID);
        $Actor->delete();

        return $this->getForPrint();
    }

    public function find(Request $request){

        $validated = $request->validate([
            'ActorID' => 'required|exists:Actor,ActorID'
        ]);

        $ActorID = $validated['ActorID'] ?? null;

        $Actor = Actor::find($ActorID);

        return response()->json($Actor);
    }

    public function edit(Request $request){

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

    public function getForPrint(){
        $actores = new Collection();

        foreach (Actor::all() as $a) {
            $act = $a;
            $act->PeliculasCount = $a->Peliculas()->count();
            $actores->add($act);
        }

        return response()->json($actores);
    } */

}
