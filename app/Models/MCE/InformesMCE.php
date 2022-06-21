<?php

namespace App\Models\MCE;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformesMCE extends Model
{
    // use HasFactory;

    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'mce_informes';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    //HABILITAR ASIGNACION MASIVA
    protected $guarded = ['id', 'created_at', 'update_at'];
}
