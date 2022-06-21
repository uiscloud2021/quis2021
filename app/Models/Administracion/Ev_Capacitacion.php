<?php

namespace App\Models\Administracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ev_Capacitacion extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'adm_evaluacion_capacitacion';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    //HABILITAR ASIGNACION MASIVA
    protected $guarded = ['id', 'created_at', 'update_at'];

    //RELACION DE UNO A MUCHOS INVERSA
    public function evaluacion(){
        return $this->belongsTo(Evaluacion::class,'evaluacion_id');
    }
    
}