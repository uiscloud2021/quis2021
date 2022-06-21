<?php

namespace App\Models\DocumentosAD;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentos_ad_formatos extends Model
{
    // use HasFactory;

    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'documentos_ad_formatos';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    //HABILITAR ASIGNACION MASIVA
    protected $guarded = ['id', 'created_at', 'update_at'];

    public function areas(){
        return $this->belongsToMany(Menu::class, 'formato', 'documento_formato_id', 'menu_id')
        ->withPivot('datos', 'datos_json');
    }

    //RELACION DE UNO A MUCHOS NORMAL
    public function formatos(){
        return $this->hasMany(Formatos_ad::class, 'documento_formato_id', 'id');
    }
}
