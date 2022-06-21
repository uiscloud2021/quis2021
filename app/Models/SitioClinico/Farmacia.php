<?php

namespace App\Models\SitioClinico;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SitioClinico\Infraestructura_Farmacia;
use App\Models\SitioClinico\Materiales_Farmacia;
use App\Models\SitioClinico\Farmacista_Farmacia;
use App\Models\SitioClinico\Control_Farmacia;
use App\Models\SitioClinico\Tramite_Farmacia;
use App\Models\SitioClinico\Visita_Farmacia;
use App\Models\SitioClinico\Queja_Farmacia;
use App\Models\SitioClinico\Seguridad_Farmacia;
use App\Models\SitioClinico\Cadena_Farmacia;
use App\Models\SitioClinico\Recepcion_Farmacia;
use App\Models\SitioClinico\Producto_Farmacia;
use App\Models\SitioClinico\Material_Farmacia;
use App\Models\SitioClinico\Equipo_Farmacia;

class Farmacia extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'sc_farmacia';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    //HABILITAR ASIGNACION MASIVA
    protected $guarded = ['farmacia_id', 'created_at', 'update_at'];
    protected $primaryKey = 'farmacia_id';


    //RELACION DE UNO A MUCHOS NORMAL
    public function infraestructura(){
        return $this->hasMany(Infraestructura_Farmacia::class);
    }

    public function materiales(){
        return $this->hasMany(Materiales_Farmacia::class);
    }

    public function farmacista(){
        return $this->hasMany(Farmacista_Farmacia::class);
    }

    public function control(){
        return $this->hasMany(Control_Farmacia::class);
    }

    public function tramite(){
        return $this->hasMany(Tramite_Farmacia::class);
    }

    public function visita(){
        return $this->hasMany(Visita_Farmacia::class);
    }

    public function queja(){
        return $this->hasMany(Queja_Farmacia::class);
    }

    public function seguridad(){
        return $this->hasMany(Seguridad_Farmacia::class);
    }

    public function cadena(){
        return $this->hasMany(Cadena_Farmacia::class);
    }

    public function recepcion(){
        return $this->hasMany(Recepcion_Farmacia::class);
    }

    public function producto(){
        return $this->hasMany(Producto_Farmacia::class);
    }

    public function material(){
        return $this->hasMany(Material_Farmacia::class);
    }

    public function equipo(){
        return $this->hasMany(Equipo_Farmacia::class);
    }
    
}