<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ObraRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'titulo' => 'required|string|max:255',
            'artist_id' => 'required|exists:artists,id',
            'ano' => 'nullable|digits:4|integer|min:1000|max:' . date('Y'),
            'descricao' => 'nullable|string',
            'tipo' => 'nullable|string|max:255',
            'dimensoes' => 'nullable|string|max:255',
            'localizacao_atual' => 'nullable|string|max:255',
            'imagem' => 'nullable|image|max:4096', // até 4MB
        ];
    }
}
