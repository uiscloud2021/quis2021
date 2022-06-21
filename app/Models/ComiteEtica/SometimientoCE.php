<?php

namespace App\Models\ComiteEtica;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ComiteEtica\Copias_Sometimiento;

class SometimientoCE extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'ce_sometimiento';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    //HABILITAR ASIGNACION MASIVA
    protected $guarded = ['sometimiento_id', 'created_at', 'update_at'];
    protected $primaryKey = 'sometimiento_id';


    //RELACION DE UNO A MUCHOS NORMAL
    public function copias(){
        return $this->hasMany(Copias_Sometimiento::class);
    }

}