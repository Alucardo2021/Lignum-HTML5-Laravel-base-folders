<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{

    public function create(Request $request){

        /* $validated = $request->validate([
            'nombre' => 'required|max:50|min:3',
            'fecha' => 'required'
        ]);

        $actor = new Actor();

        $actor->Nombre = $validated['nombre'] ?? null;
        $actor->FechaNacimiento = $validated['fecha'] ?? null;
        $actor->save();
 */
        return 1;
    }

    public function getAllActores() {
        $actores = Actor::all();
        return response()->json($actores);
    }

}
