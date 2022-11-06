<?php

namespace App\Http\Livewire;

use App\Models\Comunidad;
use App\Models\Persona;
use Livewire\Component;

class PersonaComponent extends Component
{
    public $persona;
    public $editar=false;
    public $nombres;
    public $apellidos;
    public $telefono;
    public $dpi;
    public $genero;
    public $fechaNacimiento;
    public $comunidad_id;

    protected $listeners = ['refresh' => 'refreshComponent'];
    protected $rules=[
        'nombres'=>'required',
        'apellidos'=>'required',
        'telefono'=>'required',
        'dpi'=>'required',
        'genero'=>'required',
        'fechaNacimiento'=>'required',
        'comunidad_id'=>'required',
    ];
    public function render()
    {
        $comunidades=Comunidad::where('activo','si')->get();
        $personas=Persona::where('activo','si')->get();
        return view('livewire.persona-component', compact(['personas','comunidades']));
    }
    public function create(){
        $datos= $this->validate();
        if($this->editar){
            // dd($this->cader);
             $this->persona->nombres=$this->nombres;
             $this->persona->apellidos=$this->apellidos;
             $this->persona->telefono=$this->telefono;
             $this->persona->dpi=$this->dpi;
             $this->persona->genero=$this->genero;
             $this->persona->fechaNacimiento=$this->fechaNacimiento;
             
             $this->persona->comunidad_id=$this->comunidad_id;
        
             $this->persona->save();
             $this->persona='';
            
             $this->nombres='';
             $this->apellidos='';
             $this->telefono='';
             $this->dpi='';
             $this->genero='';
             $this->fechaNacimiento='';
             $this->tipoPersona_id='';
             $this->comunidad_id='';
             $this->editar=false;
         }else{
            Persona::create([
                'nombres'=>$datos['nombres'],
                'apellidos'=>$datos['apellidos'],
                'telefono'=>$datos['telefono'],
                'dpi'=>$datos['dpi'],
                'genero'=>$datos['genero'],
                'fechaNacimiento'=>$datos['fechaNacimiento'],
                'tipoPersona_id'=>17,
                'comunidad_id'=>$datos['comunidad_id'],
                'user_id'=>auth()->id(),
                'activo'=>'si'
            ]);
            $this->nombres='';
            $this->apellidos='';
            $this->telefono='';
            $this->dpi='';
            $this->genero='';
            $this->fechaNacimiento='';
            $this->tipoPersona_id='';
            $this->comunidad_id='';
        }
       

         $this->emit('refreshComponent');
    }

    public function Editar(Persona $persona)
    {
        $this->editar=true;
        $this->persona=$persona;

        $this->nombres=$this->persona->nombres;
        $this->apellidos=$this->persona->apellidos;
        $this->telefono=$this->persona->telefono;
        $this->dpi=$this->persona->dpi;
        $this->genero=$this->persona->genero;
        $this->fechaNacimiento=$this->persona->fechaNacimiento;
        $this->comunidad_id=$this->persona->comunidad_id;

        $this->emit('refreshComponent');
    }

    public function Eliminar(Persona $persona){

        
        $persona->activo='no';
        $persona->save();
        $this->persona='';
       
        $this->emit('refreshComponent');

    }
}
