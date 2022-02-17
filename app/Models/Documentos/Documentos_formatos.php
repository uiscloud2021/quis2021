<?php

namespace App\Models\Documentos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Documentos\Formato;
use App\Models\Empresas\Empresa;
use App\Models\Menu;
use App\Models\Administracion\Proyecto;
use App\Models\User;

class Documentos_formatos extends Model
{
    // use HasFactory;

    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'documentos_formatos';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    //HABILITAR ASIGNACION MASIVA
    protected $guarded = ['id', 'created_at', 'update_at'];

    //RELACION MUCHOS A MUCHOS
    public function empresas(){
        return $this->belongsToMany(Empresa::class, 'formato', 'documento_formato_id', 'empresa_id')
        ->withPivot('datos', 'datos_json');
    }

    //TODO: Cambiar talvez relacion a solo de uno a muchos (Tabla de Formato)
    public function areas(){
        return $this->belongsToMany(Menu::class, 'formato', 'documento_formato_id', 'menu_id')
        ->withPivot('datos', 'datos_json');
    }

    public function proyectos(){
        return $this->belongsToMany(Proyecto::class, 'formato', 'documento_formato_id', 'proyecto_id')
        ->withPivot('datos', 'datos_json');
    }

    //TODO: Cambiar talvez relacion a solo de uno a muchos (Tabla de Formato)
    public function users(){
        return $this->belongsToMany(User::class, 'formato', 'documento_formato_id', 'user_id')
        ->withPivot('datos', 'datos_json');
    }

    //RELACION DE UNO A MUCHOS NORMAL
    public function formatos(){
        return $this->hasMany(Formato::class, 'documento_formato_id', 'id');
    }
}
