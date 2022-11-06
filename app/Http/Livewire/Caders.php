<?php

namespace App\Http\Livewire;

use App\Models\Cader;
use App\Models\Comunidad;
use Livewire\Component;

class Caders extends Component
{
    
    public $cader;

    public $nombre;
    public $comunidad_id;
    public $editar=false;
    
 

    protected $listeners = ['refresh' => 'refreshComponent'];
    protected $rules=[
        'nombre'=>'required',
        'comunidad_id'=>'required',
    ];
    public function render()
    {
        $caders=Cader::where('activo','si')->get();
        $comunidades=Comunidad::where('activo','si')->get();
        return view('livewire.caders', compact(['caders','comunidades']));
    }
    public function create(){
        $datos= $this->validate();

        if($this->editar){
         // dd($this->cader);
          $this->cader->nombre=$this->nombre;
          $this->cader->save();
          $this->nombre='';
          $this->comunidad_id='';

          $this->editar=false;
      }else{
          Cader::create([
            'nombre'=>$datos['nombre'],
            'comunidad_id'=>$datos['comunidad_id'],
            'activo'=>'si'
          ]);
          $this->nombre='';
          $this->comunidad_id='';
        }

         $this->emit('refreshComponent');
    }
    public function Editar(Cader $id)
    {
        $this->editar=true;
        $this->cader=$id;
        $this->nombre=$this->cader->nombre;
        $this->comunidad_id=$this->cader->comunidad_id;

        $this->emit('refreshComponent');

     
    }

    public function Eliminar(Cader $id){

        
        $id->delete();
        $this->nombre='';
          $this->comunidad_id='';
        $this->emit('refreshComponent');

    }
}
