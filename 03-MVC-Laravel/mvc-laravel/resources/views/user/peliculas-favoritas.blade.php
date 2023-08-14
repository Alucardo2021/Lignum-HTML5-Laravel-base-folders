<x-layout-user :peliculas=$peliculas>

    @livewire('peliculas-favoritas-vista-table')

    <x-slot name="script">
        <script src="{{ asset("js/user/user.js") }}"></script>
    </x-slot>
</x-layout-user>
