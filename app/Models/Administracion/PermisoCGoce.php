<?php

namespace App\Models\Administracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermisoCGoce extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'adm_permisos_cgoce';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    //HABILITAR ASIGNACION MASIVA
    protected $guarded = ['id', 'created_at', 'update_at'];

    
}