<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'nombre',
        'precio',
        'id_categoria',
        'activo'
    ];

    // cats
    protected $cats = [
        'precio' => 'decimal:2',
        'activo' => 'boolean'
    ];

    // relaciones
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }
}
