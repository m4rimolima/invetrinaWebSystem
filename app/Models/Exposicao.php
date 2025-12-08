<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exposicao extends Model
{
    use HasFactory;

   
    protected $table = 'exposicoes';

    protected $fillable = [
        'obra_id',
        'nome',
        'local',
        'data_inicio',
        'data_fim',
    ];

    public function obra()
    {
        return $this->belongsTo(Obra::class);
    }

   
    public function obras()
    {
        return $this->belongsToMany(Obra::class, 'exposicao_obra', 'exposicao_id', 'obra_id');
    }
}
