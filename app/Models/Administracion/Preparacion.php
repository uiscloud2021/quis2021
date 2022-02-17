<?php

namespace App\Models\Administracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Administracion\Prep_Visita;
use App\Models\Administracion\Prep_Estudio;
use App\Models\Administracion\Prep_Proveedor;

class Preparacion extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'adm_preparacion';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    //HABILITAR ASIGNACION MASIVA
    protected $guarded = ['id', 'created_at', 'update_at'];

    //RELACION DE UNO A MUCHOS NORMAL
    public function visita(){
        return $this->hasMany(Prep_Visita::class);
    }
    public function estudio(){
        return $this->hasMany(Prep_Estudio::class);
    }
    public function proveedor(){
        return $this->hasMany(Prep_Proveedor::class);
    }
    
}