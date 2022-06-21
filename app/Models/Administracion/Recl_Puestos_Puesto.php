<?php

namespace App\Models\Administracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recl_Puestos_Puesto extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'adm_reclutamiento_puestoscargo';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    //HABILITAR ASIGNACION MASIVA
    protected $guarded = ['id', 'created_at', 'update_at'];

    //RELACION DE UNO A MUCHOS INVERSA
    public function puestos(){
        return $this->belongsTo(Recl_Puestos::class,'puesto_id');
    }
    
}