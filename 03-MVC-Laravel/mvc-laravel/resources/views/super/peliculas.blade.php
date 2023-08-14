<x-layout-admin :pagina="$pagina">

    @include('components.peliculas-dashboard', ['peliculas' => $peliculas])

    <!-- Modal Agregar Pelicula -->
    <div class="modal fade"  id="agregarModalPelicula" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        @include('components.inner-modal-agregar-pelicula', ['actores' => $actores])
    </div>


    <!-- Modal editar Pelicula -->
    <div class="modal fade"  id="editarModalPelicula" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        @include('components.inner-modal-editar-pelicula', ['actores' => $actores])
    </div>


    <x-slot name="script">
        <script src="{{ asset("js/super/peliculas.js") }}"></script>
    </x-slot>


</x-layout-admin>
