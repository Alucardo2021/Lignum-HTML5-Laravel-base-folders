function borrarActor($actorID){
    Swal.fire({
                    title: 'Esta seguro de querer borrar a este actor?',
                    showCancelButton: true,
                    showConfirmButton: true,
                    confirmButtonText: 'Si',
                    cancelButtonText: 'No',
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.livewire.emit("actores-dashboard-borrar-actor", $actorID);
                    }
    })
}

function editarActor($actorID){
    window.livewire.emit("inner-modal-set-actor-actorID", $actorID);
}

$(document).ready(function() {

    window.addEventListener('actorBorrado', function(){
        Swal.fire('Actor Borrado Correctamente');
    })

    window.addEventListener('actorAgregado', function(){
        $("#agregarModalActor").modal("hide");
        Swal.fire('Actor Agregado Correctamente');
    })

    window.addEventListener('actorEditado', function(){
        $("#editarModalActor").modal("hide");
        Swal.fire('Actor Editado Correctamente');
    })

    //Campos del Modal Agregar Actor

    window.addEventListener('clearNombreAgregar', function(){
        $('#nombreActorAgregar').val("");
    })

    window.addEventListener('clearFechaAgregar', function(){
        $('#fechaActorAgregar').val("");
    })

    //Campos del Modal Agregar Pelicula

    window.addEventListener('clearNombreEditar', function(){
        $('#nombreActorEditar').val("");
    })

    window.addEventListener('clearFechaEditar', function(){
        $('#fechaActorEditar').val("");
    })


})
