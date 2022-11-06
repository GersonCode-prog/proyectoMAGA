<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'capacitacion_id',
        'persona_id',
        'asistio',
        'activo'
    ];
    public function persona(){
        return $this->belongsTo(Persona::class, 'persona_id');
    }
}
