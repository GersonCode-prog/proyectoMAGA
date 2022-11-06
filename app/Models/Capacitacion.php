<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capacitacion extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'fecha',
        'cader_id',
        'user_id',
        'asistio',
        'activo',
    ];

   

    public function cader(){
        return $this->belongsTo(Cader::class, 'cader_id');
    }
    public function usuario(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function asistencia()
    {
        return $this->hasMany(Asistencia::class);
    }
}
