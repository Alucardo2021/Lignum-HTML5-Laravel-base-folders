let $peliculas;

$( document ).ready(function() {
    console.log(1)
    $('#buscadorPeliculasLista').addClass("invisible");

    $.ajax({
        url: '/user/peliculas/get',
        data: {
            "_token": $('meta[name="csrf-token"]').attr('content'),
        },
        dataType: "json",
        method: "GET",
        success: function(response) {
            $peliculas = response;
        },
        error: function (e) {
            console.log(e);
        }
    });

    $('#buscadorPeliculas').on("keyup", function(event) {

        if ($(this).val() === "") {
            $('#buscadorPeliculasLista').addClass("invisible");
        } else {
            $('#buscadorPeliculasLista').removeClass("invisible");
        }
        console.log($peliculas);

        $('#buscadorPeliculasLista').empty();

        $peliculas.forEach(element => {
            if (element.Titulo.toLowerCase().includes($(this).val().toLowerCase())) {
                $('#buscadorPeliculasLista').append(
                    `<div class="w-100">
                        <a href="pelicula/${element.PeliculaID}" class="list-group-item list-group-item-action" aria-current="true" style="z-index: 1000">
                            <div class="d-flex">
                                <div>
                                    <p class="mb-1">${element.Titulo}</p>
                                    <div class="justify-content-end">
                                        <small>(${element.Año})</small>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    `);
            }


        });
    })
});


