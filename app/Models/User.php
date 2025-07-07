<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    protected $table = "usuarios";



    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nombre',  // Cambiado de 'name' a 'nombre'
        'email',
        'password',
        'codigo_verificacion',
        'codigo_expira_en',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
    'email_verified_at' => 'datetime',
    'codigo_expira_en' => 'datetime',  // Añade esta línea para que Carbon funcione bien
    'password' => 'hashed',
];

    /**
     * Relación uno a muchos con el modelo Articulo.
     */
    public function articulos()
    {
        return $this->hasMany(Articulo::class, 'usuario_id');
    }
}
