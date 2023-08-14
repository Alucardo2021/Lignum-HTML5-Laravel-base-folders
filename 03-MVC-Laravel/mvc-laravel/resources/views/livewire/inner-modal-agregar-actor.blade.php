<div>
     <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Actor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <form wire:submit.prevent="submit" id="formularioAgregarActor">
                        <div class="row px-3">
                            <div class="col-12 mb-3">
                                <label for="nombre">Nombre Completo(*):</label>
                                <div class="input-group border w-100">
                                    <input type="text" wire:model="nombre" class="form-control border-0" id="nombreActorAgregar" name="nombre" required min="3" max="50">
                                    <button class="btn" type="button" wire:click="clearNombre">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                                        </svg>
                                    </button>

                                </div>
                                @error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror

                            </div>

                            <div class="col-12 mb-3">
                                <label for="fecha">Fecha de Nacimiento(*):</label>
                                <div class="input-group border w-100">
                                    <input type="date" wire:model="fecha" name="fecha" class="form-control border-0" id="fechaActorAgregar" max="{{\Carbon\Carbon::today()->format('Y-m-d')}}">
                                    <button class="btn" type="button" wire:click="clearFecha">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                                        </svg>
                                    </button>
                                </div>
                                @error('fecha') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>

                        </div> 
                    
                    </form>

                    
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal" form="formularioAgregarActor">Close</button>
                    <button type="submit" class="btn btn-primary" id="agregarActor" form="formularioAgregarActor">Agregar Actor</button>
                </div>
        </div>
    </div>
</div>
