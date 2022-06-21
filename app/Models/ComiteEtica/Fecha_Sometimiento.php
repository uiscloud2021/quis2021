<?php

namespace App\Models\ComiteEtica;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ComiteEtica\Protocolo_Sometimiento;
use App\Models\ComiteEtica\ICF_Sometimiento;
use App\Models\ComiteEtica\Manual_Sometimiento;
use App\Models\ComiteEtica\Poliza_Sometimiento;
use App\Models\ComiteEtica\Desviacion_Sometimiento;
use App\Models\ComiteEtica\EAS_Sometimiento;
use App\Models\ComiteEtica\SUSAR_Sometimiento;
use App\Models\ComiteEtica\Renovacion_Sometimiento;
use App\Models\ComiteEtica\Erratas_Sometimiento;

class Fecha_Sometimiento extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'ce_sometimiento_fecha';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    //HABILITAR ASIGNACION MASIVA
    protected $guarded = ['id', 'created_at', 'update_at'];


    //RELACION DE UNO A MUCHOS NORMAL
    public function protocolo(){
        return $this->hasMany(Protocolo_Sometimiento::class);
    }

    public function icf(){
        return $this->hasMany(ICF_Sometimiento::class);
    }

    public function manual(){
        return $this->hasMany(Manual_Sometimiento::class);
    }

    public function poliza(){
        return $this->hasMany(Poliza_Sometimiento::class);
    }

    public function desviacion(){
        return $this->hasMany(Desviacion_Sometimiento::class);
    }

    public function eas(){
        return $this->hasMany(EAS_Sometimiento::class);
    }

    public function susar(){
        return $this->hasMany(SUSAR_Sometimiento::class);
    }

    public function renovacion(){
        return $this->hasMany(Renovacion_Sometimiento::class);
    }

    public function erratas(){
        return $this->hasMany(Erratas_Sometimiento::class);
    }
    
}