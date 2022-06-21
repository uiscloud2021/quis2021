<?php

namespace App\Models\Capacitacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Capacitacion\Evaluacion_Elemento;
use App\Models\Capacitacion\Evaluacion_Constancia;

class Evaluacion extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'capacitacion_evaluacion';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    //HABILITAR ASIGNACION MASIVA
    protected $guarded = ['id', 'created_at', 'update_at'];

    //RELACION DE UNO A MUCHOS NORMAL
    public function elemento(){
        return $this->hasMany(Evaluacion_Elemento::class);
    }

    public function constancia(){
        return $this->hasMany(Evaluacion_Constancia::class);
    }
    
}