<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticuloCategoria extends Model
{
    protected $table = "articulo_categoria"; //aqui lo tengo en singular en la base de datos
    protected $fillable = ["articulo_id","categoria_id"];
}
