<?php

namespace App\Models\SitioClinico;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SitioClinico\Equipamiento_Factibilidad;
use App\Models\SitioClinico\Seguimiento_Factibilidad;

class Factibilidad extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'sc_factibilidad';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    //HABILITAR ASIGNACION MASIVA
    protected $guarded = ['factibilidad_id', 'created_at', 'update_at'];
    protected $primaryKey = 'factibilidad_id';


    //RELACION DE UNO A MUCHOS NORMAL
    public function equipamiento(){
        return $this->hasMany(Equipamiento_Factibilidad::class);
    }

    public function seguimiento(){
        return $this->hasMany(Seguimiento_Factibilidad::class);
    }
    
}