<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'menus';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    //HABILITAR ASIGNACION MASIVA
    protected $guarded = ['id', 'created_at', 'update_at'];

    //RELACION MUCHOS A MUCHOS
    public function submenus(){
        return $this->belongsToMany(Submenu::class,'submenu_menu')
            ->withPivot('submenu_id');
    }
    
    public function empresas(){
        return $this->belongsToMany(Empresa::class,'empresa_menu')
            ->withPivot('empresa_id');
    }

    public function users(){
        return $this->belongsToMany(User::class,'menu_user')
            ->withPivot('user_id');
    }
}