<?php

namespace App\Models\DocumentosID;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentos_id_manuales extends Model
{
    // use HasFactory;

    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'documentos_id_manuales';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    //HABILITAR ASIGNACION MASIVA
    protected $guarded = ['id', 'created_at', 'update_at'];
}
