<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombres',
        'apellidos',
        'telefono',
        'dpi',
        'genero',
        'fechaNacimiento',
        'tipoPersona_id',        
        'comunidad_id',
        'user_id',
        'activo'  
    ];

    public function comunidad(){
        return $this->belongsTo(Comunidad::class, 'comunidad_id');
    }

    public function usuario(){
        return $this->belongsTo(User::class, 'user_id');
    }
   
}
