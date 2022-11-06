<?php

namespace App\Http\Livewire;

use App\Models\Comunidad;
use Livewire\Component;

class ComunidadComponent extends Component
{
    public $comunidad;
    public $comunidadobj;

    public $editar=false;
    protected $listeners = ['refresh' => 'refreshComponent'];
    protected $rules=[
        'comunidad'=>'required',
    ];
    public function render()
    {
        $comunidades=Comunidad::where('activo','si')->get();
        return view('livewire.comunidad-component', compact('comunidades'));
    }
    public function create(){
        $datos= $this->validate();
        if($this->editar){
            // dd($this->cader);
             $this->comunidadobj->comunidad=$this->comunidad;
             $this->comunidadobj->save();
             $this->comunidad='';
                
             $this->editar=false;
         }else{
            Comunidad::create([
            'comunidad'=>$datos['comunidad'],
            'activo'=>'si'
            ]);
        }
       

         $this->emit('refreshComponent');
    }

    public function Editar(Comunidad $comunidad)
    {
        $this->editar=true;
        $this->comunidadobj=$comunidad;
        $this->comunidad=$this->comunidadobj->comunidad;
        

        $this->emit('refreshComponent');
    }

    public function Eliminar(Comunidad $comunidad){

        
        $comunidad->activo='no';
        $comunidad->save();
        $this->comunidad='';
          $this->comunidadobj='';
        $this->emit('refreshComponent');

    }
}
