<?php

namespace App\Models\ComiteEtica;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditoriaCE extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'ce_auditoria';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    //HABILITAR ASIGNACION MASIVA
    protected $guarded = ['auditoria_id', 'created_at', 'update_at'];
    protected $primaryKey = 'auditoria_id';


    
}