<div class="grid grid-cols-3 gap-4  p-2">

  
    <div class="bg-sky-100 p-8 col-start-1 col-end-3   border border-blue-400 rounded rounded-lg  shadow-md sm:p-6 md:p-8 dark:bg-sky-100 dark:border-sky-700">
                              
      <form class="col-start-1 col-end-3" method="POST" wire:submit.prevent="create">
        @csrf
  
            <h5 class="text-xl font-medium text-gray-900 ">Registrar un Tipo de Persona</h5>
            <div>
                <label for="tipo" class="block mb-2 text-sm font-medium text-gray-900 ">Tipo Persona:</label>
                <input type="text" wire:model='tipo' id="tipo" class="pt-3 bg-sky-50 border border-sky-300 text-sky-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Tipo de persona.." required="">
            </div>
            
           
            <button  class=" mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
              @if($editar)
              Editar
              @else
              Agregar
              @endif
            </button>
       
      </form>
    </div>
  
    <div class="bg-blue-50 col-start-3 col-end-7 border border-4 border-sky-400 rounded-lg">
      
      <table class=" text-sm  text-gray-500 dark:text-gray-400 w-full rounded-lg   ">
        <thead class="text-xs text-gray-700 uppercase bg-blue-100 dark:bg-sky-700 dark:text-white rounded-lg">
          <tr>
            <th scope="col" class="py-3 px-6">ID</th>
            <th scope="col" class="py-3 px-6">TIPO</th>
            <th scope="col" class="py-3 px-6">ACCIONES</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($tipospersona as $t )
            
          <tr class="bg-white border-b  border-gray-700">
            <td class="py-4 px-6">{{$t->id}}</td>
            <td class="py-4 px-6">{{$t->tipo}}</td>
            <td class="py-4 px-6 ">
              
            <div class="flex p-2">
              <div class=" ">
                <button wire:click="Editar({{$t->id}})" class="bg-yellow-300 p-1 rounded-l" >Editar</button>
              </div>
              <div>
                <button wire:click="Eliminar({{$t->id}})" class="bg-red-600 text-white p-1 rounded-l ml-2" >Eliminar</button>
              </div>
            </div>
            </td>
          </tr>    
         
          @endforeach
        </tbody>
      </table>

    </div>
          
</div>