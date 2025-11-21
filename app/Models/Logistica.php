<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Logistica extends Model
{
    protected $fillable = [
        'obra_id',
        'exposicao_id',
        'status',
        'data_movimentacao',
        'responsavel',
        'telefone',
        'local_origem',
        'local_destino',
        'detalhes',
    ];

    public function obra(): BelongsTo
    {
        return $this->belongsTo(Obra::class);
    }

    public function exposicao(): BelongsTo
    {
        return $this->belongsTo(Exposicao::class);
    }
}
