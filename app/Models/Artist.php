<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Artist extends Model
{
    protected $fillable = [
        'nome',
        'nacionalidade',
        'data_nascimento',
        'biografia',
    ];

    public function obras(): HasMany
    {
        return $this->hasMany(Obra::class);
    }
}
