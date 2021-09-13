<?php

namespace App\Models\Empresas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Empresas\Socio;
use App\Models\Empresas\Domicilio;
use App\Models\Empresas\Legal;
use App\Models\Empresas\Documento;
use App\Models\Empresas\Responsabilidad;
use App\Models\Empresas\Sanitario;
use App\Models\Empresas\Cuenta;
use App\Models\Empresas\Propiedad;
use App\Models\Empresas\Vinculacion;
use App\Models\Menu;
use App\Models\User;

class Empresa extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'empresas';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    //HABILITAR ASIGNACION MASIVA
    protected $guarded = ['id', 'created_at', 'update_at'];

    //RELACION MUCHOS A MUCHOS
    public function menus(){
        return $this->belongsToMany(Menu::class,'empresa_menu')
            ->withPivot('menu_id');
    }

    public function users(){
        return $this->belongsToMany(User::class,'empresa_user')
            ->withPivot('user_id');
    }

    //RELACION DE UNO A MUCHOS NORMAL
    public function socios(){
        return $this->hasMany(Socio::class);
    }

    public function domicilios(){
        return $this->hasMany(Domicilio::class);
    }

    public function legales(){
        return $this->hasMany(Legal::class);
    }

    public function documentos(){
        return $this->hasMany(Documento::class);
    }

    public function responsabilidades(){
        return $this->hasMany(Responsabilidad::class);
    }

    public function sanitario(){
        return $this->hasMany(Sanitario::class);
    }

    public function cuentas(){
        return $this->hasMany(Cuenta::class);
    }

    public function propiedad(){
        return $this->hasMany(Propiedad::class);
    }

    public function vinculacion(){
        return $this->hasMany(Vinculacion::class);
    }
}