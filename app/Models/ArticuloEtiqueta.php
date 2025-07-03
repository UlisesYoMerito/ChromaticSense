<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticuloEtiqueta extends Model
{
    protected $table = "articulo_etiqueta"; //aqui lo tengo en singular en la base de datos
    protected $fillable = ["articulo_id","etiqueta_id"];
}
