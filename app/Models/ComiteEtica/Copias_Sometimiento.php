<?php

namespace App\Models\ComiteEtica;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Copias_Sometimiento extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'ce_sometimiento_copias';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    //HABILITAR ASIGNACION MASIVA
    protected $guarded = ['id', 'created_at', 'update_at'];

    //RELACION DE UNO A MUCHOS INVERSA
    public function sometimiento(){
        return $this->belongsTo(SometimientoCE::class,'sometimiento_id');
    }
    
}