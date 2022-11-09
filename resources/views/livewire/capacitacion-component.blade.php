<div class="grid grid-cols-6 gap-2  p-2">

  
    <div class="bg-sky-100 p-8 col-start-1 col-end-3   border border-blue-400 rounded rounded-lg  shadow-md sm:p-6 md:p-2 dark:bg-sky-100 dark:border-sky-700">
                              
      <form class="col-start-1 col-end-3" method="POST" wire:submit.prevent="create">
        @csrf
  
            <h5 class="text-xl font-medium text-gray-900 ">Registro de capacitaciones</h5>
            <div>
                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 ">Nombre:</label>
                <input type="text" wire:model='nombre' id="nombre" class="pt-3 bg-sky-50 border border-sky-300 text-sky-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Nombre de la capacitacion.." required="">
            </div>

          

          <div>
            <label for="fecha" class="block mb-2 text-sm font-medium text-gray-900 ">Fecha de capacitacion: </label>
            <input type="date" wire:model='fecha' id="genero" class="pt-3 bg-sky-50 border border-sky-300 text-sky-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Fecha.." required="">
          </div>

         

           <div>
            <label for="comunidad" class="block mb-2 text-sm font-medium text-gray-900">Seleccione un cader</label>
            <select wire:model="cader_id" class="pt-3 bg-sky-50 border border-sky-300 text-sky-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" >
                <option selected>Seleccione un CADER: </option>
                @foreach ($caders as $ca )
                <option value="{{$ca->id}}">{{$ca->nombre}}</option>        
                @endforeach
            </select>
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
  
    <div class="bg-sky-50 col-start-3 col-end-8 ">
      
      <table class=" text-sm  text-gray-500 dark:text-gray-400 w-auto border border-2 border-sky-500  rounded-lg   ">
        <thead class="text-xs text-gray-700 uppercase bg-teal-100 dark:bg-sky-700 dark:text-white rounded-lg w-auto">
          <tr>
            <th scope="col" class="py-3 px-6">ID</th>
            <th scope="col" class="py-3 px-6">NOMBRE</th>
            <th scope="col" class="py-3 px-6">FECHA</th>
            <th scope="col" class="py-3 px-6">CADER</th>
            <th scope="col" class="py-3 px-6">EDITAR/ELIMINAR</th>




          </tr>
        </thead>
        <tbody>
          @foreach ($capacitaciones as $p )
            
          <tr class="bg-white border-b  border-gray-700">
            <td class="py-4 px-6">{{$p->id}}</td>
            <td class="py-4 px-6">{{$p->nombre}} </td>
            <td class="py-4 px-6">{{$p->fecha}}</td>
            <td class="py-4 px-6">{{$p->cader->nombre}}</td>
            <td class="py-4 px-6 flex gap-2 ">
              <div class="flex p-2">
                <div class=" ">
                  <button wire:click="Editar({{$p->id}})" class="bg-yellow-200 text-gray-500 p-2 rounded-l" >Editar</button>
                </div>
                <div class="text-center mt-2">
                  <a href="{{route('asistencia',$p->id)}}" class="bg-teal-600 text-white p-2 rounded-l ml-2 " > <span class="p-1 mr-1 bg-gray-500 font-bold">{{count($p->asistencia)}}</span>Asitencia</a>
                </div>
                <div>
                  <button wire:click="Eliminar({{$p->id}})" class="bg-red-600 text-white p-2 rounded-l ml-2" >Eliminar</button>
                </div>
              </div>
            </td>
          
          </tr>    
          @endforeach
        </tbody>
      </table>
    </div>
  
</div>