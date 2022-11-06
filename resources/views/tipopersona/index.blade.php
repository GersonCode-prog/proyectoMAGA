<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tipo Persona') }}
            {{-- ESTE SIRVE PARA MOSTRAR EL TITULO EN CADA PAGINA DE MODULO --}}
        </h2>
    </x-slot>

    <div class="py-12 max-w-screen-xl">
        <div class="  sm:px-6 lg:px-8 max-w-screen-xl">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg max-w-screen-xl">
                <div class="p-6 bg-white border-b border-gray-200 max-w-screen-xl gap-4">
                    <div class="bg-cyan-600 grid justify-items-stretch  ">

                      
                            <livewire:tipopersona-component /> 
                           
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Modal toggle -->

  
  <!-- Main modal -->
  
  
</x-app-layout>

@push('scripts')
<script>
    function fireModal(action = 1) {

        if (action == 1) {
            document.querySelector('.modal').classList.add('show')
            document.querySelector('.modal').style.display = 'block'
        } else {
            document.querySelector('.modal').classList.add('hide')
            document.querySelector('.modal').style.display = 'none'
        }
    }



    window.addEventListener('modal-open', event => {
        fireModal(1)
    })

    window.addEventListener('noty', event => {
        Swal.fire('', event.detail.msg)
        if (event.detail.action == 'close-modal') fireModal(0)
    })


   
</script>
@endpush