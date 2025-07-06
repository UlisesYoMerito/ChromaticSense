<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Articulo extends Model
{


    protected $fillable = ["id"];


    protected $table = "articulos";

    /* 
                protected $table = "articulos";
                Esto dice a laravel que este modelo trabaja con la tabla "articulos" de la base de datos.

            */

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, "usuario_id", "id");
    }
    

    public function etiquetas(): BelongsToMany
    {
        return $this->belongsToMany(Etiqueta::class, "articulo_etiqueta", "articulo_id", "etiqueta_id");
    }

    

    /* 
    
        BeloongsTo   Es una relación uno a muchos inversa
        
        hace referencia a una relación de tipo "pertenece a" entre dos modelos.
        entonces   

        $this referencia al modelo actual (en este caso, Articulo),

        User::class modelo con el que estamos relacionando, que representa la tabla de usuarios en la base de datos.

            Primero se pone la clave foránea

        los parametros :"usuario_id 
            indica que la columna en la tabla de articulos que contiene la clave foránea es "usuario_id",
            y 
            : "id"  
            indica que la columna en la tabla de usuarios que contiene la clave primaria

    */

    public function scopeOrdernarPorFecha($query)
    {
        return $query->orderby('created_at');
    }

   


    /* 
            scopeOrdernarPorFecha es un método de consulta que se puede usar para ordenar los artículos por fecha de creación.
            El método recibe un parámetro $query, que representa la consulta actual.    
        */
}
