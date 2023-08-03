let ID;

imagenPeliculaAgregar.onchange = evt => {
    const [file] = imagenPeliculaAgregar.files
    if (file) {
      preview.src = URL.createObjectURL(file)
    }
}




function printActorTable(response) {
    $("#tbodyActores").empty();
        response.forEach(element => {
            $("#tbodyActores").append(
                `<tr>
                <td>${element.ActorID}</td>
                <td>${element.Nombre}</td>
                <td>${element.FechaNacimiento }</td>
                <td>${element.PeliculasCount}</td>
                <td>
                    <button type="button" class="btn btn-outline-secondary editarBotonActor" data-bs-toggle="modal" data-bs-target="#editarModalActor" onclick="guardarID({{ $actor->ActorID }})">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                        </svg>
                    </button>
                    <button type="button" class="btn btn-outline-secondary eliminarBotonActor" data-bs-toggle="modal" data-bs-target="#eliminarModalActor" onclick="guardarID({{ $actor->ActorID }})">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                        </svg>
                    </button>
                </td>
                </tr>`
            )

    });
}
function guardarID(ExternalID) {
    ID = ExternalID;
}

    //AGREGAR ACTOR / MODAL / LIMPIAR CAMPOS
$('body').on('click', '#agregarActor', function (e){
    $.ajax({
        url: '/actor/create',
        data: {
            "_token": $('meta[name="csrf-token"]').attr('content'),
            'nombre': $('#nombreActorAgregar').val(),
            'fecha': $('#fechaActorAgregar').val(),
        },
        dataType: "json",
        method: "POST",
        success: function(response) {

            $("#agregarModalActor").modal("hide");
            $('#nombreActorAgregar').val("");
            $('#fechaActorAgregar').val("");
            Swal.fire('Actor Agregado Correctamente');

            printActorTable(response);
        },
        error: function (e) {
            console.log(e.responseJSON.errors);
            if(e.responseJSON.errors.nombre){
                $('#nombreActorAgregar').addClass("is-invalid");
                $('#errorNombreAgregar').removeClass("invisible");
                $('#errorNombreAgregar').text(e.responseJSON.errors.nombre[0])
            }else{
                $('#nombreActorAgregar').removeClass("is-invalid");
                $('#errorNombreAgregar').addClass("invisible");
            }

            if(e.responseJSON.errors.fecha){
                $('#fechaActorAgregar').addClass("is-invalid");
                $('#errorFechaAgregar').removeClass("invisible");
                $('#errorFechaAgregar').text(e.responseJSON.errors.fecha[0])
            }else{
                $('#fechaActorAgregar').removeClass("is-invalid");
                $('#errorFechaAgregar').addClass("invisible");
            }

        }
    });
});

$('body').on('click', '#boton-x-nombre-agregar', function (e){
    $('#nombreActorAgregar').val("");
});

$('body').on('click', '#boton-x-fecha-agregar', function (e){
    $('#fechaActorAgregar').val("");
});
    //AGREGAR ACTOR / MODAL / LIMPIAR CAMPOS




    //ELIMINAR ACTOR / MODAL
$('body').on('click', '#eliminarActor', function (e){
    $.ajax({
        url: '/actor/delete',
        data: {
            "_token": $('meta[name="csrf-token"]').attr('content'),
            'ActorID': ID,
        },
        dataType: "json",
        method: "POST",
        success: function(response) {

            $("#eliminarModalActor").modal("hide");

            Swal.fire('Actor Eliminado Correctamente');

            printActorTable(response);

        },
        error: function (e) {
        }
    });
});
    //ELIMINAR ACTOR / MODAL


    //EDITAR ACTOR / MODAL / LIMPIAR CAMPOS
$('body').on('click', '.editarBotonActor', function (e){
    console.log(ID)
    $.ajax({
        url: '/actor/find',
        data: {
            "_token": $('meta[name="csrf-token"]').attr('content'),
            'ActorID': ID,
        },
        dataType: "json",
        method: "GET",
        success: function(response) {
            console.log(response)
            $('#fechaActorEditar').val(response.FechaNacimiento);
            $('#nombreActorEditar').val(response.Nombre);
        },
        error: function (e) {
        }
    });
});
$('body').on('click', '#editarActor', function (e){
    $.ajax({
        url: '/actor/edit',
        data: {
            "_token": $('meta[name="csrf-token"]').attr('content'),
            'ActorID': ID,
            'nombre': $('#nombreActorEditar').val(),
            'fecha': $('#fechaActorEditar').val(),
        },
        dataType: "json",
        method: "POST",
        success: function(response) {

            $("#editarModalActor").modal("hide");
            $('#nombreActorEditar').val("");
            $('#fechaActorEditar').val("");
            Swal.fire('Actor Editado Correctamente');

            printActorTable(response);
        },
        error: function (e) {
            console.log(e.responseJSON.errors);
            if(e.responseJSON.errors.nombre){
                $('#nombreActorEditar').addClass("is-invalid");
                $('#errorNombreEditar').removeClass("invisible");
                $('#errorNombreEditar').text(e.responseJSON.errors.nombre[0])
            }else{
                $('#nombreActorEditar').removeClass("is-invalid");
                $('#errorNombreEditar').addClass("invisible");
            }

            if(e.responseJSON.errors.fecha){
                $('#fechaActorEditar').addClass("is-invalid");
                $('#errorFechaEditar').removeClass("invisible");
                $('#errorFechaEditar').text(e.responseJSON.errors.fecha[0])
            }else{
                $('#fechaActorEditar').removeClass("is-invalid");
                $('#errorFechaEditar').addClass("invisible");
            }

        }
    });
});
$('body').on('click', '#boton-x-nombre-editar', function (e){
    $('#nombreActorEditar').val("");
});
$('body').on('click', '#boton-x-fecha-editar', function (e){
    $('#fechaActorEditar').val("");
});
     //EDITAR ACTOR / MODAL / LIMPIAR CAMPOS




