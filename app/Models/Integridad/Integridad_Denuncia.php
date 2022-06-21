<?php

namespace App\Models\Integridad;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Integridad_Denuncia extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'integridad_indagaciones';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    //HABILITAR ASIGNACION MASIVA
    protected $guarded = ['id', 'created_at', 'update_at'];

    //RELACION DE UNO A MUCHOS INVERSA
    public function integridad(){
        return $this->belongsTo(Integridad::class,'denuncia_id');
    }
    
}