<x-layout-admin :pagina="$pagina">


    @livewire('actores-dashboard', ['actores' => $actores])


    <!-- Modal Agregar Actor -->
    <div class="modal fade" id="agregarModalActor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        @livewire('inner-modal-agregar-actor')
    </div>

    <!-- Modal Editar Actor -->
    <div class="modal fade" id="editarModalActor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        @livewire('inner-modal-editar-actor')
    </div>

    <x-slot name="script">
        <script src="{{ asset("js/super/actores.js") }}"></script>
    </x-slot>


</x-layout-admin>
