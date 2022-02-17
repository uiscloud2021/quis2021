<?php

namespace App\Models\Administracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Administracion\Cont_Contrato;

class Contratacion extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'adm_contratacion';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    //HABILITAR ASIGNACION MASIVA
    protected $guarded = ['id', 'created_at', 'update_at'];

    //RELACION DE UNO A MUCHOS NORMAL
    public function contrato(){
        return $this->hasMany(Cont_Contrato::class);
    }
    
}