<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //la tabla con la cual el modelo se relaciona 
    protected $table= "countries";
    //la clave primaria de la tabla
    protected $primaryKey="country_id";
    // anular campos de la auditoria
    public $timestamps = false; 
    use HasFactory;
    //relacion M:M entre pais y sus idiomas
    public function idiomas(){
        return $this->belongsToMany(Idioma::class,
                                    'country_languages',
                                    'country_id',
                                    'languages_id')->
                                    withPivot('official');
    }
}
