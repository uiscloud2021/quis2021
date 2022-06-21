<?php

namespace App\Models\Capacitacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Capacitacion\Contenidos_Modulo;
use App\Models\Capacitacion\Contenidos_Tema;
use App\Models\Capacitacion\Contenidos_Actividad;
use App\Models\Capacitacion\Contenidos_Evaluacion;
use App\Models\Capacitacion\Contenidos_Recurso;

class Contenidos extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'capacitacion_contenidos';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    //HABILITAR ASIGNACION MASIVA
    protected $guarded = ['id', 'created_at', 'update_at'];

    //RELACION DE UNO A MUCHOS NORMAL
    public function modulo(){
        return $this->hasMany(Contenidos_Modulo::class);
    }

    public function tema(){
        return $this->hasMany(Contenidos_Tema::class);
    }

    public function actividad(){
        return $this->hasMany(Contenidos_Actividad::class);
    }

    public function evaluacion(){
        return $this->hasMany(Contenidos_Evaluacion::class);
    }

    public function recurso(){
        return $this->hasMany(Contenidos_Recurso::class);
    }

    
}