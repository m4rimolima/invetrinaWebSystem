<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Exposicao extends Model
{
    protected $fillable = [
        'nome',
        'data_inicio',
        'data_fim',
        'descricao',
    ];

    public function obras(): BelongsToMany
    {
        return $this->belongsToMany(Obra::class, 'exposicao_obra');
    }
}
