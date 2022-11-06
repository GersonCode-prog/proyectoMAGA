<?php

namespace App\Http\Livewire;

use App\Models\Asistencia;
use App\Models\Capacitacion;
use App\Models\Persona;
use Livewire\Component;
use PDF;

class AsistenciaComponent extends Component
{
    

    public $capacitacion_id;
    public $persona_id;
    public $capacitacion;
    public $search;
    
    
    

    protected $listeners = ['refresh' => 'refreshComponent'];
    protected $rules=[
        'persona_id'=>'required',
    ];
    
    public function mount($capacitacion){
        $this->capacitacion = $capacitacion;
      }
    public function render()
    {
        
        $asistencias=Asistencia::where('activo','si')->where('capacitacion_id', $this->capacitacion->id)->get();
        $personas=Persona::where('activo','si')->get();
        return view('livewire.asistencia-component', compact(['asistencias','personas']));
    }
    public function create(){
        $datos= $this->validate();
      Asistencia::create([
          'capacitacion_id'=>$this->capacitacion->id,
          'persona_id'=>$datos['persona_id'],
          'asistio'=>'si',
          'activo'=>'si'
      ]);
       $this->persona_id='';

         $this->emit('refreshComponent');
    }

    public function destroy(Asistencia $asistencia){

        $asistencia->delete();
        $this->emit('refreshComponent');

    }

    
  
}
