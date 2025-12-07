<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logistica extends Model
{
    use HasFactory;

    protected $fillable = [
        'obra_id',
        'responsavel',
        'local_origem',
        'local_destino',
        'data_transporte',
    ];

    protected $casts = [
        'data_transporte' => 'date',
    ];

    public function obra()
    {
        return $this->belongsTo(Obra::class);
    }
}
