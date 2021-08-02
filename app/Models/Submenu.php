<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'submenus';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    //HABILITAR ASIGNACION MASIVA
    protected $guarded = ['id', 'created_at', 'update_at'];

    //RELACION MUCHOS A MUCHOS
    public function menus(){
        return $this->belongsToMany(Menu::class,'submenu_menu')
            ->withPivot('menu_id');
    }

    public function users(){
        return $this->belongsToMany(User::class,'submenu_user')
            ->withPivot('user_id');
    }
}