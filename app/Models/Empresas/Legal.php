<?php

namespace App\Models\Empresas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Legal extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'legal_empresas';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    //HABILITAR ASIGNACION MASIVA
    protected $guarded = ['id', 'created_at', 'update_at'];

    //RELACION DE UNO A MUCHOS INVERSA
    public function empresas(){
        return $this->belongsTo(Empresa::class,'empresa_id');
    }
}