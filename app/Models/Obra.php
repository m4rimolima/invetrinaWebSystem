<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'artist_id',
        'ano',
        'tecnica',
        'imagem', // se for usar upload de imagem
    ];

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }
}
