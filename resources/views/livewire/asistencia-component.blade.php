<div class="bg-blue-200 grid grid-cols-6 gap-2  ">

  <div class="col-span-4 ">
      <div class="flex flex-col h-40 justify-center p-2">
        <span class="text-2xl text-center">Asistencia de personas para la Capacitacion de: {{$capacitacion->nombre }}</span>
        <span class="text-center">Fecha: {{$capacitacion->fecha}}</span>
        <span class="text-center font-bold">CADER: <P class="bg-blue-500 p-3 text-white">{{$capacitacion->cader->nombre}}</P> </span>

      </div>
      <div class="flex  text-center ">
        <a href="{{route('pdf',$capacitacion->id)}}" class=" text-white bg-gray-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 text-center dark:hover:bg-blue-700 dark:focus:ring-blue-800"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">

        {{-- <a wire:click="createPDF({{$capacitacion->id}})" class=" text-white bg-gray-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 text-center dark:hover:bg-blue-700 dark:focus:ring-blue-800"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"> --}}
          <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
        </svg>
        Guardar pdf</a>

      </div>
  </div>
    <div class="bg-sky-100 p-8 col-start-1 col-end-3   border border-blue-400 rounded rounded-lg  shadow-md sm:p-6 md:p-2 dark:bg-sky-100 dark:border-sky-700">
                              
      <form class="col-start-1 col-end-3" method="POST" wire:submit.prevent="create">
        @csrf
           

           
           <div class="p-3" wire:ignore>
          
              {{-- <label for="search" class="block mb-2 text-sm font-medium text-gray-900 ">search de capacitacion: </label>
              <input type="text" wire:model='search' id="search" class="pt-3 bg-sky-50 border border-sky-300 text-sky-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Buscar persona.." required="">
            --}}
            <select wire:model="persona_id" class="pt-2 bg-sky-50 border border-sky-300 text-sky-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 select2 " >
                <option selected">Seleccione una persona: </option>
                @foreach ($personas as $p )
                <option value="{{$p->id}}">{{$p->nombres}}{{$p->apellidos}}</option>        
                @endforeach
            </select>
            </div>

           
            <button  class="reset mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Asistio</button>
       
      </form>
    </div>
  
    <div class="bg-sky-50 col-start-3 col-end-8 ">
      <div>
        <span>{{$search}}</span>
      </div>
      <table class=" text-sm  text-gray-500 dark:text-gray-400 w-auto border border-2 border-sky-500  rounded-lg   ">
        <thead class="text-xs text-gray-700 uppercase bg-teal-100 dark:bg-sky-700 dark:text-white rounded-lg w-auto">
          <tr>
            <th scope="col" class="py-3 px-6">ID</th>
            <th scope="col" class="py-3 px-6">NOMBRE</th>
            <th scope="col" class="py-3 px-6">ACCION</th>




          </tr>
        </thead>
        <tbody>
          @foreach ($asistencias as $a )
            
          <tr class="bg-white border-b  border-gray-700">
            <td class="py-4 px-6">{{$a->id}}</td>
            <td class="py-4 px-6">{{$a->persona->nombres}}-{{$a->persona->apellidos}}</td>

            <td class="py-4 px-6 flex gap-2 ">
              
              <div >
                <button wire:click="destroy({{$a->id}})" class="bg-red-400 p-3  rounded-lg text-black">Eliminar</button>
              </div>
            </td>
          </tr>    
          @endforeach
        </tbody>
      </table>

      
    </div>
    @section('scripts')
  <script>
    $(document).ready(function() {
    $('.select2').select2();
    
    $('.select2').on('change', function(){
        @this.set('persona_id', $(this).val())
    });

    

});
  </script>
  @endsection
</div>
