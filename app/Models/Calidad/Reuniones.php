<?php

namespace App\Models\Calidad;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Calidad\Reuniones_Asuntos;

class Reuniones extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'calidad_reuniones';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    //HABILITAR ASIGNACION MASIVA
    protected $guarded = ['id', 'created_at', 'update_at'];

    //RELACION DE UNO A MUCHOS NORMAL
    public function asuntos(){
        return $this->hasMany(Reuniones_Asuntos::class);
    }
    
}