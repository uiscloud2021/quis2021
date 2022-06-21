<?php

namespace App\Models\Capacitacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Capacitacion\Diagnostico_Fecha;
use App\Models\Capacitacion\Diagnostico_Conocimiento;
use App\Models\Capacitacion\Diagnostico_Habilidad;
use App\Models\Capacitacion\Diagnostico_Aptitud;
use App\Models\Capacitacion\Diagnostico_Capacitacion;
use App\Models\Capacitacion\Diagnostico_Area;
use App\Models\Capacitacion\Diagnostico_Grado;
use App\Models\Capacitacion\Diagnostico_Propuesta;

class Diagnostico extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'capacitacion_diagnostico';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    //HABILITAR ASIGNACION MASIVA
    protected $guarded = ['id', 'created_at', 'update_at'];

    //RELACION DE UNO A MUCHOS NORMAL
    public function fecha(){
        return $this->hasMany(Diagnostico_Fecha::class);
    }

    public function conocimiento(){
        return $this->hasMany(Diagnostico_Conocimiento::class);
    }

    public function habilidad(){
        return $this->hasMany(Diagnostico_Habilidad::class);
    }

    public function aptitud(){
        return $this->hasMany(Diagnostico_Aptitud::class);
    }

    public function capacitacion(){
        return $this->hasMany(Diagnostico_Capacitacion::class);
    }

    public function area(){
        return $this->hasMany(Diagnostico_Area::class);
    }

    public function grado(){
        return $this->hasMany(Diagnostico_Grado::class);
    }

    public function propuesta(){
        return $this->hasMany(Diagnostico_Propuesta::class);
    }
    
}