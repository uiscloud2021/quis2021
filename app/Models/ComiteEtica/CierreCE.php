<?php

namespace App\Models\ComiteEtica;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ComiteEtica\Domicilio_Cierre;

class CierreCE extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'ce_cierre';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    //HABILITAR ASIGNACION MASIVA
    protected $guarded = ['cierre_id', 'created_at', 'update_at'];
    protected $primaryKey = 'cierre_id';


    //RELACION DE UNO A MUCHOS NORMAL
    public function domicilio(){
        return $this->hasMany(Domicilio_Cierre::class);
    }

}