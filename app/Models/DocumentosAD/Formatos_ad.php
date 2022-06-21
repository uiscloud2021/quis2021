<?php

namespace App\Models\DocumentosAD;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formatos_ad extends Model
{
    // use HasFactory;

    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'formatos_ad';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    //HABILITAR ASIGNACION MASIVA
    protected $guarded = ['id', 'created_at', 'update_at'];

    //RELACION MUCHO A UNO (BelongsTo)
    public function docformato(){
        return $this->belongsTo(Documentos_ad_formatos::class, 'documento_formato_id');
    }

    public function empresa(){
        return $this->belongsTo(Empresa::class);
    }

    public function area(){
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    public function proyecto(){
        return $this->belongsTo(Proyecto::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
