<?php

namespace App\Models\Calidad;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Calidad\Auditoria_Equipo;
use App\Models\Calidad\Auditoria_Requisito;

class Auditoria extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'calidad_auditoria';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    //HABILITAR ASIGNACION MASIVA
    protected $guarded = ['id', 'created_at', 'update_at'];

    //RELACION DE UNO A MUCHOS NORMAL
    public function equipo(){
        return $this->hasMany(Auditoria_Equipo::class);
    }

    public function requisito(){
        return $this->hasMany(Auditoria_Requisito::class);
    }
    
}