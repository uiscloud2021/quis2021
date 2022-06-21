<?php

namespace App\Models\Responsabilidad;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsabilidad_Acciones extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'responsabilidad_acciones';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    //HABILITAR ASIGNACION MASIVA
    protected $guarded = ['id', 'created_at', 'update_at'];

    //RELACION DE UNO A MUCHOS INVERSA
    public function responsabilidad(){
        return $this->belongsTo(Responsabilidad::class,'responsabilidad_id');
    }
    
}