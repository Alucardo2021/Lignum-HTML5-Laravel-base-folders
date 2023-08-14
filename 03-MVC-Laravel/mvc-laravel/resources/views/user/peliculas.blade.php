<x-layout-user :peliculas=$peliculas>

    @livewire('peliculas-vista-grid')

    <x-slot name="script">
        <script src="{{ asset("js/user/user.js") }}"></script>
    </x-slot>
</x-layout-user>
