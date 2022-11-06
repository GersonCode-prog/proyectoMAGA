<x-modal-header title="Editar TipoPersona" action="Edit" size="modal-lg" />
<div wire:ignore.self class="modal fade" id="modalCustomers" tabindex="-1" role="dialog">
    <div class="modal-dialog {{$size}}" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{$title}} | {{$action}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <svg> ... </svg>
                </button>
            </div>
            <div class="modal-body">

<div class="col-lg-12 layout-spacing">
    <div class="statbox widget box box-shadow">

        <div class="widget-content widget-content-area">
            <form class="row g-3" autocomplete="off">
                <div>
                    <label for="tipo" class="block mb-2 text-sm font-medium text-gray-900 ">Editar Tipo Persona:</label>
                    <input type="text" wire:model='tipo' id="tipo" class="pt-3 bg-sky-50 border border-sky-300 text-sky-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Beneficiario.." required="">
                </div>

            </form>

        </div>
    </div>
</div>


</div>
<div class="modal-footer">
    <button class="btn" onclick="fireModal(0)"><i class="flaticon-cancel-12"></i> CANCELAR</button>
   
    <button type="button"  wire:click.prevent="update" class="btn btn-primary">

        <span >EDITAR</span>

     
    </button>
    
</div>
</div>
</div>
</div>