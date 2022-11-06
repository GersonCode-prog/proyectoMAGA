<title>MAGA</title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tipo Persona') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-screen-xl">
        <div class="  sm:px-6 lg:px-8 max-w-screen-xl">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg max-w-screen-xl">
                <div class="p-6 bg-white border-b border-gray-200 max-w-screen-xl gap-4">
                    <div class="grid justify-items-stretch w-full ">

                      
                            <livewire:capacitacion-component /> 
                           
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

