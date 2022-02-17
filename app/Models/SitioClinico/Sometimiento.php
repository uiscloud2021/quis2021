<?php

namespace App\Models\SitioClinico;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SitioClinico\Som_Equipo;
use App\Models\SitioClinico\Som_Sometimiento;
use App\Models\SitioClinico\Som_Respuesta;

class Sometimiento extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'sc_sometimiento';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    //HABILITAR ASIGNACION MASIVA
    protected $guarded = ['id', 'created_at', 'update_at'];

    //RELACION DE UNO A MUCHOS NORMAL
    public function equipo(){
        return $this->hasMany(Som_Equipo::class);
    }
    public function som(){
        return $this->hasMany(Som_Sometimiento::class);
    }
    public function respuesta(){
        return $this->hasMany(Som_Respuesta::class);
    }
    
}