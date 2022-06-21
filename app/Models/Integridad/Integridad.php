<?php

namespace App\Models\Integridad;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Integridad\Integridad_Denuncia;

class Integridad extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'integridad_denuncia';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    //HABILITAR ASIGNACION MASIVA
    protected $guarded = ['id', 'created_at', 'update_at'];

    //RELACION DE UNO A MUCHOS NORMAL
    public function indagacion(){
        return $this->hasMany(Integridad_Denuncia::class);
    }

    
}