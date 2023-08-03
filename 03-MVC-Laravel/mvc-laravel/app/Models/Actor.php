<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Actor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "Actor";
    protected $primaryKey = "ActorID";

    public function Peliculas(){
        return $this->hasMany('\App\Models\Pelicula','ActorPrincipalID','ActorID')->where('deleted_at', null);
    }

}
