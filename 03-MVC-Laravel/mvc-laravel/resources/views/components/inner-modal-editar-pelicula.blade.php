<div>
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Pelicula</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

                        <div class="modal-body">

                                <div class="row px-3">

                                    <div class="col-6 mb-3">
                                        <label for="titulo">Titulo(*):</label>
                                        <div class="input-group border w-100">
                                            <input type="text" class="form-control border-0" id="tituloPeliculaEditar" name="titulo" required min="1" max="30">
                                            <button class="btn" type="button" id="boton-x-titulo-editar">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                                                </svg>
                                            </button>

                                        </div>
                                        <span class="text-danger invisible" id="errorTituloEditar"></span>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label for="año">Año(*):</label>
                                        <div class="input-group border w-100">
                                            <input type="number" class="form-control border-0" id="añoPeliculaEditar" name="año" required min="1895" max="{{\Carbon\Carbon::today()->format('Y')}}">
                                            <button class="btn" type="button" id="boton-x-año-editar">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                                                </svg>
                                            </button>

                                        </div>
                                        <span class="text-danger invisible" id="errorAñoEditar"></span>
                                    </div>

                                    <div class="col-7 mb-3">
                                        <label for="actor">Actor(*):</label>
                                        <div class="input-group border w-100">
                                            <select class="form-select border-0" aria-label="Default select example" required name="actor" id="actorPrincipalPeliculaEditar">
                                                <option value="0" selected>Seleccione el Actor Principal</option>
                                                @foreach ($actores as $actor)
                                                <option value="{{ $actor->ActorID }}">{{ $actor->Nombre}}</option>
                                                @endforeach
                                            </select>

                                            <button class="btn" type="button" id="boton-x-actor-editar">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                                                </svg>
                                            </button>

                                        </div>
                                        <span class="text-danger invisible" id="errorActorEditar"></span>
                                    </div>

                                    <div class="col-5 mb-3">
                                        <label for="duracion">Duracion (en minutos)(*):</label>
                                        <div class="input-group border w-100">
                                            <input type="number" class="form-control border-0" id="duracionPeliculaEditar" name="duracion" required min="1" max="600">
                                            <button class="btn" type="button" id="boton-x-duracion-editar">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                                                </svg>
                                            </button>

                                        </div>
                                        <span class="text-danger invisible" id="errorDuracionEditar"></span>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="sinopsis">Sinopsis(*):</label>
                                        <div class="input-group border w-100">
                                            <textarea class="form-control border-0" id="sinopsisPeliculaEditar" name="sinopsis" rows="3" required minlength="3" maxlength="500"></textarea>
                                            <button class="btn" type="button" id="boton-x-sinopsis-editar">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                                                </svg>
                                            </button>

                                        </div>
                                        <span class="text-danger invisible" id="errorSinopsisEditar"></span>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="imagen">Imagen(*):</label>
                                        <div class="input-group border w-100">
                                            <input class="border-0 form-control" accept="image/*" type='file' id="imagenPeliculaEditar" name="imagen"/>
                                            <button class="btn align-self-end" type="button" id="boton-x-imagen-editar">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="text-center mt-2">
                                            <img id="previewPeliculaEditar" src="#" alt="Imagen" width="259" height="384"/>
                                        </div>
                                        <span class="text-danger invisible" id="errorImagenEditar"></span>
                                    </div>

                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="editarPelicula">Editar Pelicula</button>
                        </div>

        </div>

    </div>
</div>
