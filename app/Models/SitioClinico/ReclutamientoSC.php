<?php

namespace App\Models\SitioClinico;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SitioClinico\Cronograma_Reclutamiento;
use App\Models\SitioClinico\Estrategia_Reclutamiento;
use App\Models\SitioClinico\Contacto_Reclutamiento;
use App\Models\SitioClinico\Criterio_Reclutamiento;
use App\Models\SitioClinico\Preseleccion_Reclutamiento;
use App\Models\SitioClinico\FuenteSujeto_Reclutamiento;
use App\Models\SitioClinico\FuenteEstudio_Reclutamiento;
use App\Models\SitioClinico\FuenteVisita_Reclutamiento;
use App\Models\SitioClinico\Rec_Reclutamiento;
use App\Models\SitioClinico\Proteccion_Reclutamiento;

class ReclutamientoSC extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'sc_reclutamiento';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    //HABILITAR ASIGNACION MASIVA
    protected $guarded = ['reclutamiento_id', 'created_at', 'update_at'];
    protected $primaryKey = 'reclutamiento_id';


    //RELACION DE UNO A MUCHOS NORMAL
    public function cronograma(){
        return $this->hasMany(Cronograma_Reclutamiento::class);
    }

    public function estrategia(){
        return $this->hasMany(Estrategia_Reclutamiento::class);
    }

    public function contacto(){
        return $this->hasMany(Contacto_Reclutamiento::class);
    }

    public function criterio(){
        return $this->hasMany(Criterio_Reclutamiento::class);
    }

    public function preseleccion(){
        return $this->hasMany(Preseleccion_Reclutamiento::class);
    }

    public function fuentesujeto(){
        return $this->hasMany(FuenteSujeto_Reclutamiento::class);
    }

    public function fuenteestudio(){
        return $this->hasMany(FuenteEstudio_Reclutamiento::class);
    }

    public function fuentevisita(){
        return $this->hasMany(FuenteVisita_Reclutamiento::class);
    }

    public function rec(){
        return $this->hasMany(Rec_Reclutamiento::class);
    }

    public function proteccion(){
        return $this->hasMany(Proteccion_Reclutamiento::class);
    }

    
}