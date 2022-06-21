<?php

namespace App\Models\Rexbiot;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rexbiot\Ganado_Vacuna;
use App\Models\Rexbiot\Ganado_Manejo1;
use App\Models\Rexbiot\Ganado_Manejo2;

class Ganado extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'rexbiot_ganado';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    //HABILITAR ASIGNACION MASIVA
    protected $guarded = ['id', 'created_at', 'update_at'];

    //RELACION DE UNO A MUCHOS NORMAL
    public function vacuna(){
        return $this->hasMany(Ganado_Vacuna::class);
    }

    public function manejo1(){
        return $this->hasMany(Ganado_Manejo1::class);
    }

    public function manejo2(){
        return $this->hasMany(Ganado_Manejo2::class);
    }
    
}