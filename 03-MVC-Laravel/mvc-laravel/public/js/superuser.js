let ID;


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
                    <button type="button" class="btn btn-outline-secondary editarBotonActor" data-bs-toggle="modal" data-bs-target="#editarModalActor" onclick="guardarID(${ element.ActorID })">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                        </svg>
                    </button>
                    <button type="button" class="btn btn-outline-secondary eliminarBotonActor" data-bs-toggle="modal" data-bs-target="#eliminarModalActor" onclick="guardarID(${ element.ActorID })">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                        </svg>
                    </button>
                </td>
                </tr>`
            )

    });
}

function printPeliculaTable(response) {
    $("#tbodyPeliculas").empty();
        response.forEach(element => {
            $("#tbodyPeliculas").append(
                `<tr>
                <td>${element.PeliculaID}</td>
                <td>${ element.Titulo }</td>
                <td> ${element.NombreActor} </td>
                <td>${element.Año}</td>
                <td>${element.Duracion} </td>
                <td>
                    <button type="button" class="btn btn-outline-secondary btn-ver-imagen" onclick="guardarID( ${element.PeliculaID} )">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                        </svg>
                    </button>
                </td>
                <td>
                    <button type="button" class="btn btn-outline-secondary editarBotonPelicula" data-bs-toggle="modal" data-bs-target="#editarModalPelicula" onclick="guardarID( ${element.PeliculaID} )" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                        </svg>
                    </button>
                    <button type="button" class="btn btn-outline-secondary eliminarBotonPelicula" data-bs-toggle="modal" data-bs-target="#eliminarModalPelicula" onclick="guardarID(${element.PeliculaID})">
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

            printActorTable(response[0]);
            printPeliculaTable(response[1]);
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

            printActorTable(response[0]);
            printPeliculaTable(response[1]);

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

            printActorTable(response[0]);
            printPeliculaTable(response[1]);
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









//AGREGAR PELICULA//

    imagenPeliculaAgregar.onchange = evt => {
            const [file] = imagenPeliculaAgregar.files
            if (file) {
            previewPeliculaAgregar.src = URL.createObjectURL(file);
            }
    }


    $('body').on('click', '#agregarPelicula', function (e){
        var formData = new FormData();
        var photo = $('#imagenPeliculaAgregar').prop('files')[0];

        formData.append('imagen',photo);

        formData.append('titulo' ,$('#tituloPeliculaAgregar').val());
        formData.append('año' ,$('#añoPeliculaAgregar').val());
        formData.append('actor' ,$('#actorPrincipalPeliculaAgregar').val());
        formData.append('sinopsis' ,$('#sinopsisPeliculaAgregar').val());
        formData.append('duracion' ,$('#duracionPeliculaAgregar').val());

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/pelicula/create',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            type: "POST",
            success: function(response) {

                $("#agregarModalPelicula").modal("hide");

                $('#tituloPeliculaAgregar').val("");
                $('#añoPeliculaAgregar').val("");

                $("#actorPrincipalPeliculaAgregar option[value='0']").prop("selected",true);

                $('#sinopsisPeliculaAgregar').val("");
                $('#duracionPeliculaAgregar').val("");

                $('#imagenPeliculaAgregar').val("");
                $('#previewPeliculaAgregar').attr('src',"#");

                Swal.fire('Pelicula Agregada Correctamente');

                printActorTable(response[0]);
                printPeliculaTable(response[1]);
            },
            error: function (e) {
                console.log(e.responseJSON.errors);

                if(e.responseJSON.errors.titulo){
                    $('#tituloPeliculaAgregar').addClass("is-invalid");
                    $('#errorTituloAgregar').removeClass("invisible");
                    $('#errorTituloAgregar').text(e.responseJSON.errors.titulo[0])
                }else{
                    $('#tituloPeliculaAgregar').removeClass("is-invalid");
                    $('#errorTituloAgregar').addClass("invisible");
                }

                if(e.responseJSON.errors.año){
                    $('#añoPeliculaAgregar').addClass("is-invalid");
                    $('#errorAñoAgregar').removeClass("invisible");
                    $('#errorAñoAgregar').text(e.responseJSON.errors.año[0])
                }else{
                    $('#añoPeliculaAgregar').removeClass("is-invalid");
                    $('#errorAñoAgregar').addClass("invisible");
                }

                if(e.responseJSON.errors.actor){
                    $('#actorPeliculaAgregar').addClass("is-invalid");
                    $('#errorActorAgregar').removeClass("invisible");
                    $('#errorActorAgregar').text(e.responseJSON.errors.actor[0])
                }else{
                    $('#actorPeliculaAgregar').removeClass("is-invalid");
                    $('#errorActorAgregar').addClass("invisible");
                }

                if(e.responseJSON.errors.duracion){
                    $('#duracionPeliculaAgregar').addClass("is-invalid");
                    $('#errorDuracionAgregar').removeClass("invisible");
                    $('#errorDuracionAgregar').text(e.responseJSON.errors.duracion[0])
                }else{
                    $('#duracionPeliculaAgregar').removeClass("is-invalid");
                    $('#errorDuracionAgregar').addClass("invisible");
                }

                if(e.responseJSON.errors.sinopsis){
                    $('#sinopsisPeliculaAgregar').addClass("is-invalid");
                    $('#errorSinopsisAgregar').removeClass("invisible");
                    $('#errorSinopsisAgregar').text(e.responseJSON.errors.sinopsis[0])
                }else{
                    $('#sinopsisPeliculaAgregar').removeClass("is-invalid");
                    $('#errorSinopsisAgregar').addClass("invisible");
                }

                if(e.responseJSON.errors.imagen){
                    $('#imagenPeliculaAgregar').addClass("is-invalid");
                    $('#errorImagenAgregar').removeClass("invisible");
                    $('#errorImagenAgregar').text(e.responseJSON.errors.imagen[0])
                }else{
                    $('#imagenPeliculaAgregar').removeClass("is-invalid");
                    $('#errorImagenAgregar').addClass("invisible");
                }



            }
        });
    })


    $('body').on('click', '#boton-x-titulo-agregar', function (e){
        $('#tituloPeliculaAgregar').val("");
    });
    $('body').on('click', '#boton-x-año-agregar', function (e){
        $('#añoPeliculaAgregar').val("");
    });
    $('body').on('click', '#boton-x-actor-agregar', function (e){
        $("#actorPrincipalPeliculaAgregar option[value='0']").prop("selected",true);
    });
    $('body').on('click', '#boton-x-duracion-agregar', function (e){
        $('#duracionPeliculaAgregar').val("");
    });
    $('body').on('click', '#boton-x-sinopsis-agregar', function (e){
        $('#sinopsisPeliculaAgregar').val("");
    });
    $('body').on('click', '#boton-x-imagen-agregar', function (e){
        $('#imagenPeliculaAgregar').val("");
        $('#previewPeliculaAgregar').attr('src',"#");
    });

//AGREGAR PELICULA//



    //ELIMINAR PELICULA//


    $('body').on('click', '#eliminarPelicula', function (e){
        $.ajax({
            url: '/pelicula/delete',
            data: {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                'PeliculaID': ID,
            },
            dataType: "json",
            method: "POST",
            success: function(response) {

                $("#eliminarModalPelicula").modal("hide");

                Swal.fire('Pelicula Eliminada Correctamente');

                printActorTable(response[0]);
                printPeliculaTable(response[1]);

            },
            error: function (e) {
                console.log(e);
            }
        });
    });

    //ELIMINAR PELICULA//

//VER IMAGEN DE PELICULA
$('body').on('click', '.btn-ver-imagen', function (e) {

    $.ajax({
        url: '/pelicula/find',
        data: {
            "_token": $('meta[name="csrf-token"]').attr('content'),
            'PeliculaID': ID
        },
        dataType: "json",
        method: "GET",
        success: function(response) {
            console.log(response);
            Swal.fire({
                title: response.Titulo,
                imageUrl: response.Imagen,

                imageWidth: 259,
                imageHeight: 384,
                imageAlt: 'Imagen de '+ response.Titulo,
              })
        },
        error: function (e) {
        }
    });

 })
//VER IMAGEN DE PELICULA


//EDITAR PELICULA//

imagenPeliculaEditar.onchange = evt => {
    const [file] = imagenPeliculaEditar.files
    if (file) {
    previewPeliculaEditar.src = URL.createObjectURL(file);
    }
}


$('body').on('click', '.editarBotonPelicula', function (e){
    console.log(ID)
    $.ajax({
        url: '/pelicula/find',
        data: {
            "_token": $('meta[name="csrf-token"]').attr('content'),
            'PeliculaID': ID,
        },
        dataType: "json",
        method: "GET",
        success: function(response) {
            console.log(response)
            $('#tituloPeliculaEditar').val(response.Titulo);
            $('#añoPeliculaEditar').val(response.Año);

            $("#actorPrincipalPeliculaEditar option[value='"+ response.ActorPrincipalID +"']").prop("selected",true);

            $('#sinopsisPeliculaEditar').val(response.Sinopsis);
            $('#duracionPeliculaEditar').val(response.Duracion);

            $('#imagenPeliculaEditar').val('');
            $('#previewPeliculaEditar').attr('src',response.Imagen);
        },
        error: function (e) {

        }
    });
});




$('body').on('click', '#editarPelicula', function (e){
        let bandera;
        var formData = new FormData();
        var photo = $('#imagenPeliculaEditar').prop('files')[0];



        if (photo) {
            bandera = 0;
        } else {
            bandera = 1;
        }

        console.log(bandera);

        formData.append('imagen',photo);
        formData.append('titulo' ,$('#tituloPeliculaEditar').val());
        formData.append('año' ,$('#añoPeliculaEditar').val());
        formData.append('actor' ,$('#actorPrincipalPeliculaEditar').val());
        formData.append('sinopsis' ,$('#sinopsisPeliculaEditar').val());
        formData.append('duracion' ,$('#duracionPeliculaEditar').val());
        formData.append('bandera', bandera );
        formData.append('PeliculaID', ID);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/pelicula/edit',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            type: "POST",
            success: function(response) {

                $("#editarModalPelicula").modal("hide");

                $('#tituloPeliculaEditar').val("");
                $('#añoPeliculaEditar').val("");

                $("#actorPrincipalPeliculaEditar option[value='0']").prop("selected",true);

                $('#sinopsisPeliculaEditar').val("");
                $('#duracionPeliculaEditar').val("");

                $('#imagenPeliculaEditar').val("");
                $('#previewPeliculaEditar').attr('src',"#");

                Swal.fire('Pelicula Editada Correctamente');

                printActorTable(response[0]);
                printPeliculaTable(response[1]);
            },
            error: function (e) {
                console.log(e.responseJSON.errors);

                if(e.responseJSON.errors.titulo){
                    $('#tituloPeliculaEditar').addClass("is-invalid");
                    $('#errorTituloEditar').removeClass("invisible");
                    $('#errorTituloEditar').text(e.responseJSON.errors.titulo[0])
                }else{
                    $('#tituloPeliculaEditar').removeClass("is-invalid");
                    $('#errorTituloEditar').addClass("invisible");
                }

                if(e.responseJSON.errors.año){
                    $('#añoPeliculaEditar').addClass("is-invalid");
                    $('#errorAñoEditar').removeClass("invisible");
                    $('#errorAñoEditar').text(e.responseJSON.errors.año[0])
                }else{
                    $('#añoPeliculaEditar').removeClass("is-invalid");
                    $('#errorAñoEditar').addClass("invisible");
                }

                if(e.responseJSON.errors.actor){
                    $('#actorPeliculaEditar').addClass("is-invalid");
                    $('#errorActorEditar').removeClass("invisible");
                    $('#errorActorEditar').text(e.responseJSON.errors.actor[0])
                }else{
                    $('#actorPeliculaEditar').removeClass("is-invalid");
                    $('#errorActorEditar').addClass("invisible");
                }

                if(e.responseJSON.errors.duracion){
                    $('#duracionPeliculaEditar').addClass("is-invalid");
                    $('#errorDuracionEditar').removeClass("invisible");
                    $('#errorDuracionEditar').text(e.responseJSON.errors.duracion[0])
                }else{
                    $('#duracionPeliculaEditar').removeClass("is-invalid");
                    $('#errorDuracionEditar').addClass("invisible");
                }

                if(e.responseJSON.errors.sinopsis){
                    $('#sinopsisPeliculaEditar').addClass("is-invalid");
                    $('#errorSinopsisEditar').removeClass("invisible");
                    $('#errorSinopsisEditar').text(e.responseJSON.errors.sinopsis[0])
                }else{
                    $('#sinopsisPeliculaEditar').removeClass("is-invalid");
                    $('#errorSinopsisEditar').addClass("invisible");
                }

                if(e.responseJSON.errors.imagen){
                    $('#imagenPeliculaEditar').addClass("is-invalid");
                    $('#errorImagenEditar').removeClass("invisible");
                    $('#errorImagenEditar').text(e.responseJSON.errors.imagen[0])
                }else{
                    $('#imagenPeliculaEditar').removeClass("is-invalid");
                    $('#errorImagenEditar').addClass("invisible");
                }

            }
        });
    })


    $('body').on('click', '#boton-x-titulo-editar', function (e){
        $('#tituloPeliculaEditar').val("");
    });
    $('body').on('click', '#boton-x-año-editar', function (e){
        $('#añoPeliculaEditar').val("");
    });
    $('body').on('click', '#boton-x-actor-editar', function (e){
        $("#actorPrincipalPeliculaEditar option[value='0']").prop("selected",true);
    });
    $('body').on('click', '#boton-x-duracion-editar', function (e){
        $('#duracionPeliculaEditar').val("");
    });
    $('body').on('click', '#boton-x-sinopsis-editar', function (e){
        $('#sinopsisPeliculaEditar').val("");
    });
    $('body').on('click', '#boton-x-imagen-editar', function (e){
        $('#imagenPeliculaEditar').val("");
        $('#previewPeliculaEditar').attr('src',"#");
    });

//EDITAR PELICULA//
