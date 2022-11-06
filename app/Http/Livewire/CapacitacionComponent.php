<?php

namespace App\Http\Livewire;

use App\Models\Cader;
use App\Models\Capacitacion;
use Livewire\Component;

class CapacitacionComponent extends Component
{
    
    public $capacitacion;

    public $nombre;
    public $fecha;
    public $cader_id;
    public $editar=false;
    
    

    protected $listeners = ['refresh' => 'refreshComponent'];
    protected $rules=[
        'nombre'=>'required',
        'fecha'=>'required',
        'cader_id'=>'required',
    ];
    
    public function render()
    {
        $capacitaciones=Capacitacion::where('activo','si')->get();
        $caders=Cader::where('activo','si')->get();
        return view('livewire.capacitacion-component', compact(['capacitaciones','caders']));
    }
    public function create(){
        $datos= $this->validate();

        if($this->editar){
            // dd($this->cader);
             $this->capacitacion->nombre=$this->nombre;
             $this->capacitacion->fecha=$this->fecha;
             $this->capacitacion->cader_id=$this->cader_id;
   
             $this->capacitacion->save();
             $this->nombre='';
             $this->fecha='';
             $this->cader_id='';

             $this->editar=false;
         }else{
            Capacitacion::create([
                'nombre'=>$datos['nombre'],
                'fecha'=>$datos['fecha'],
                'cader_id'=>$datos['cader_id'],
                'user_id'=>auth()->id(),
                'activo'=>'si'
            ]);
        }

         $this->emit('refreshComponent');
    }

    public function asistencia(Capacitacion $capacitacion){
        
         dd('clic');
        return view('asistencia.index',compact('capacitacion'));
    }


}
