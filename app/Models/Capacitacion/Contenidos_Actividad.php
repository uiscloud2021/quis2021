<?php

namespace App\Models\Capacitacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contenidos_Actividad extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'capacitacion_contenidos_actividad';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    //HABILITAR ASIGNACION MASIVA
    protected $guarded = ['id', 'created_at', 'update_at'];

    //RELACION DE UNO A MUCHOS INVERSA
    public function actividad(){
        return $this->belongsTo(Contenidos::class,'contenido_id');
    }
    
}