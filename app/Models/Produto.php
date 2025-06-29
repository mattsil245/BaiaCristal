<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produtos';

    public $fillable = ['id', 'nome', 'id_categoria', 'preco', 'desc', 'imagem', 'status'];

    public function categoria()
    {
    return $this->belongsTo(Categoria::class, 'id_categoria');
    }
}
