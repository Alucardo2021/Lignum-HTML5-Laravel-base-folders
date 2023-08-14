<div>
    <div class="container mt-3 mb-3" style="height:80vmin;overflow-y:auto" >
        <div class="row row-cols-1 row-cols-md-3 g-4" >

            @foreach ($peliculas as $pelicula)
                <div class="col">

                    <div class="card text-white bg-dark mb-0 h-100 position-relative" style="max-width: 40vw">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <div class="m-0">
                                    @if ($pelicula->Imagen)
                                        <img class="img-fluid rounded-start" src="{{ $pelicula->Imagen }}" alt="Imagen"/>
                                    @else
                                        {{-- <img class="rounded-start" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRvMbBfwYp9XlUO5VEH97dMphXsEDPsfOfAqby9RmazFQ&s" alt="Imagen" /> --}}
                                    @endif
                                </div>

                            </div>
                                <div class="col-md-8">
                                    <div class="card-body">

                                            <h5 class="card-title">{{ $pelicula->Titulo }}</h5>


                                        <p class="card-text"><small class="text-muted">({{ $pelicula->Año }})</small></p>
                                        @if ($pelicula->ActorPrincipal)
                                            <p class="card-text">Protagonista: {{ $pelicula->ActorPrincipal->Nombre}}</p>
                                        @else
                                            <p class="card-text">Protagonista: Actor Eliminado en la BD</p>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="position-absolute" style="bottom:0;right:0">

                                <a class="btn btn-secondary border-0" href="/user/pelicula/{{ $pelicula->PeliculaID }}" role="button" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                    </svg>
                                </a>


                                <button type="button" class="btn btn-secondary border-0" wire:click="cambiarFavorito({{ $pelicula->PeliculaID }})">
                                    @if ($pelicula->Favorito)
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                            <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                        </svg>
                                    @endif
                                </button>
                            </div>

                    </div>

                </div>


            @endforeach
        </div>
        <div class="row justify-content-md-center mt-5">
            <div class="col-md-auto">
                {{ $peliculas->links() }}
            </div>
        </div>

    </div>

</div>
