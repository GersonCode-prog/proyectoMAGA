<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cader extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'comunidad_id',     
        'activo'  
    ];

    public function comunidad(){
        return $this->belongsTo(Comunidad::class, 'comunidad_id');
    }
}
