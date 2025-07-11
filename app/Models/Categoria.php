<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Categoria extends Model
{
    protected $table = "categorias";
    protected $fillable = ["id"];
    /* 
        Aqui tambien estamos usando la tala categorias
    */
    public function articulos(): BelongsToMany{
        return $this->belongsToMany(Articulo::class,
            "articulo_categoria",
            "categoria_id",
            "articulo_id");
    }

    /*  
        BelongsToMany establece una relación de muchos a muchos entre el modelo Etiqueta y el modelo Articulo.
        Aqui necesitamos una tabla intermedia llamada articulo_etiqueta,
        que contiene las claves foráneas de ambas tablas: etiqueta_id y articulo_id.
        siendo etiqueta_id:
                la clave foránea que hace referencia a la tabla etiquetas,
        y 
        articulo_id: 
                 la clave foránea que hace referencia a la tabla articulos.


        
    */

    public function scopeNombre($query, $nombre){
        return $query->where('nombre', $nombre);
    }




    /* 
        scopeNombre es un método de consulta que permite filtrar las etiquetas por su nombre.
        Recibe dos parámetros: $query (la consulta actual) y $nombre (el nombre de la etiqueta a buscar).
        Devuelve la consulta filtrada por el nombre especificado.

        en este caso la consulta se filtra por el nombre de la etiqueta.
    */
}