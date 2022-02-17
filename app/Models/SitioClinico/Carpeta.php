<?php

namespace App\Models\SitioClinico;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SitioClinico\Carp_Farmacista;
use App\Models\SitioClinico\Carp_Control;
use App\Models\SitioClinico\Carp_Tramite;
use App\Models\SitioClinico\Carp_Verificacion;

class Carpeta extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'sc_carpeta';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    //HABILITAR ASIGNACION MASIVA
    protected $guarded = ['id', 'created_at', 'update_at'];

    //RELACION DE UNO A MUCHOS NORMAL
    public function farmacista(){
        return $this->hasMany(Carp_Farmacista::class);
    }
    public function control(){
        return $this->hasMany(Carp_Control::class);
    }
    public function tramite(){
        return $this->hasMany(Carp_Tramite::class);
    }
    public function verificacion(){
        return $this->hasMany(Carp_Verificacion::class);
    }
    
}