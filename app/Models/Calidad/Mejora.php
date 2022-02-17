<?php

namespace App\Models\Calidad;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mejora extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'calidad_mejora';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    //HABILITAR ASIGNACION MASIVA
    protected $guarded = ['id', 'created_at', 'update_at'];

    
    
}