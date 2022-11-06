<?php

namespace App\Http\Livewire;

use App\Models\Tipopersona;
use Illuminate\Auth\Events\Validated;
use Livewire\Component;

class TipopersonaComponent extends Component
{
    public $tipo;
    public $tipoEdit;
    public $editar=false;
    // public $id;
    public $tipoPersona;

    protected $listeners = ['Edit' => 'Editar'];
    protected $rules=[
        'tipo'=>'required',
    
    ];
    
    public function render()
    {
        $tipospersona=Tipopersona::where('activo','si')->get();
        return view('livewire.tipopersona-component',compact('tipospersona'));
    }

    public function create(){
        
        $datos= $this->validate();  
        //dd('paso validacion');
        if($this->editar){
            //dd($this->tipo);
            $this->tipoPersona->tipo=$this->tipo;
            $this->tipoPersona->save();
            $this->tipo='';
            $this->editar=false;
        }else{
            
            $tipoPerson = Tipopersona::create([
                'tipo' => $datos['tipo'],
                'activo'=>'si'
            ]);
            $this->tipo='';     
        }
        

        $this->emit('refreshComponent');
    }

    public function Editar(Tipopersona $id)
    {
        //dd($id);
        $this->editar=true;
        $this->tipo=$id->tipo;
        $this->tipoPersona=$id;
     
    }

    public function Eliminar(Tipopersona $persona){

        
        $persona->delete();
        $this->emit('refreshComponent');

    }
}
