<?php

namespace App\Models\Administracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Administracion\Ev_Verificacion;
use App\Models\Administracion\Ev_Capacitacion;

class Evaluacion extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'adm_evaluacion';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    //HABILITAR ASIGNACION MASIVA
    protected $guarded = ['id', 'created_at', 'update_at'];

    //RELACION DE UNO A MUCHOS NORMAL
    public function verificacion(){
        return $this->hasMany(Ev_Verificacion::class);
    }

    public function capacitacion(){
        return $this->hasMany(Ev_Capacitacion::class);
    }
    
}