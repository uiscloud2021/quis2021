<?php

namespace App\Models\Empresas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'documentos_empresas';

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