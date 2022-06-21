<?php

namespace App\Models\Capacitacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnostico_Propuesta extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'capacitacion_diagnostico_propuesta';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    //HABILITAR ASIGNACION MASIVA
    protected $guarded = ['id', 'created_at', 'update_at'];

    //RELACION DE UNO A MUCHOS INVERSA
    public function propuesta(){
        return $this->belongsTo(Diagnostico::class,'diagnostico_id');
    }
    
}