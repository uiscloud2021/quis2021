<?php

namespace App\Models\Calidad;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reuniones_Asuntos extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'calidad_reuniones_asuntos';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    //HABILITAR ASIGNACION MASIVA
    protected $guarded = ['id', 'created_at', 'update_at'];

    //RELACION DE UNO A MUCHOS INVERSA
    public function reuniones(){
        return $this->belongsTo(Reuniones::class,'reunion_id');
    }
    
}