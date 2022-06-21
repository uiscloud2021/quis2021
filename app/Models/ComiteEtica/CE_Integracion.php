<?php

namespace App\Models\ComiteEtica;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CE_Integracion extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'ce_integracion_ce';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    //HABILITAR ASIGNACION MASIVA
    protected $guarded = ['id', 'created_at', 'update_at'];

    //RELACION DE UNO A MUCHOS INVERSA
    public function integracion(){
        return $this->belongsTo(Integracion::class,'integracion_id');
    }
    
}