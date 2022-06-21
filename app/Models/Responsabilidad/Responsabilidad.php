<?php

namespace App\Models\Responsabilidad;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Responsabilidad\Responsabilidad_Acciones;

class Responsabilidad extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'responsabilidad_social';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    //HABILITAR ASIGNACION MASIVA
    protected $guarded = ['id', 'created_at', 'update_at'];

    //RELACION DE UNO A MUCHOS NORMAL
    public function acciones(){
        return $this->hasMany(Responsabilidad_Acciones::class);
    }

    
}