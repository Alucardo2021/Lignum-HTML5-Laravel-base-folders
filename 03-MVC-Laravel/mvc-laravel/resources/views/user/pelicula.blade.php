<x-layout-user :peliculas=$peliculas>

    @livewire('pelicula-vista-individual',['peli' => $pelicula])

    <x-slot name="script">
        <script src="{{ asset("js/user/user.js") }}"></script>
    </x-slot>
</x-layout-user>
