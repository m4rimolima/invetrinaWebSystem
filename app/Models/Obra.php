<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Obra extends Model
{
    protected $fillable = [
        'titulo',
        'artist_id',
        'ano',
        'descricao',
        'tipo',
        'dimensoes',
        'localizacao_atual',
        'imagem',
    ];

    public function artist(): BelongsTo
    {
        return $this->belongsTo(Artist::class);
    }

    public function exposicoes(): BelongsToMany
    {
        return $this->belongsToMany(Exposicao::class, 'exposicao_obra');
    }
}
