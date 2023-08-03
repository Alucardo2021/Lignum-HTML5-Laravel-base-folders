<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pelicula extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "Pelicula";
    protected $primaryKey = "PeliculaID";

    public function ActorPrincipal(){
        return $this->belongsTo('\App\Models\Actor', 'ActorPrincipalID', 'ActorID')->where('deleted_at', null);
    }
}
