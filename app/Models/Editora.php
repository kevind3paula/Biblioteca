<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editora extends Model
{
    /** @use HasFactory<\Database\Factories\EditoraFactory> */
    use HasFactory;

    public function livros()
    {
        return $this->hasMany(Livro::class);
    }

    protected $fillable = ['nome', 'logo'];
}
