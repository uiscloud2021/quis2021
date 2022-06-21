<?php

namespace App\Models\Rexbiot;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pastoreo extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'rexbiot_pastoreo';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    //HABILITAR ASIGNACION MASIVA
    protected $guarded = ['id', 'created_at', 'update_at'];

    
}