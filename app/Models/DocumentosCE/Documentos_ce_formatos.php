<?php

namespace App\Models\DocumentosCE;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Documentos\Formato;
use App\Models\Empresas\Empresa;
use App\Models\Menu;
use App\Models\Administracion\Proyecto;
use App\Models\User;

class Documentos_ce_formatos extends Model
{
    // use HasFactory;

    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'documentos_ce_formatos';

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
        return $this->hasMany(Formato_ce::class, 'documento_formato_id', 'id');
    }
}
