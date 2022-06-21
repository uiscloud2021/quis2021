<?php

namespace App\Models\ComiteEtica;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ComiteEtica\Ocupacion_Integracion;
use App\Models\ComiteEtica\Historia_Integracion;
use App\Models\ComiteEtica\Cargo_Integracion;
use App\Models\ComiteEtica\QUIS_Integracion;
use App\Models\ComiteEtica\CE_Integracion;
use App\Models\ComiteEtica\PCCE_Integracion;
use App\Models\ComiteEtica\Otra_Integracion;

class Integracion extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'ce_integracion';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    //HABILITAR ASIGNACION MASIVA
    protected $guarded = ['integracion_id', 'created_at', 'update_at'];
    protected $primaryKey = 'integracion_id';


    //RELACION DE UNO A MUCHOS NORMAL
    public function ocupacion(){
        return $this->hasMany(Ocupacion_Integracion::class);
    }

    public function historia(){
        return $this->hasMany(Historia_Integracion::class);
    }

    public function cargo(){
        return $this->hasMany(Cargo_Integracion::class);
    }

    public function quis(){
        return $this->hasMany(QUIS_Integracion::class);
    }

    public function ce(){
        return $this->hasMany(CE_Integracion::class);
    }

    public function pcce(){
        return $this->hasMany(pcce_Integracion::class);
    }

    public function otra(){
        return $this->hasMany(Otra_Integracion::class);
    }
    
}