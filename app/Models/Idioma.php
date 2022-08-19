<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
    //la tabla con la cual el modelo se relaciona 
    protected $table= "languages";
    //la clave primaria de la tabla
    protected $primaryKey="language_id";
    // anular campos de la auditoria
    public $timestamps = false; 
    use HasFactory;
    
    //relacion de M:M con paises(Country)
    public function paises(){
        //belongsToMany: Parametros
        //1 El modelo a relacionar 
        //2 la tabla pivot
        //3 la Fk
        return $this->belongsToMany(Country::class, 'country_languages','language_id', 'country_id')->withPivot('official');
    }
}
