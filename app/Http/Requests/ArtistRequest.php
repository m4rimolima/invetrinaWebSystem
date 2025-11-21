<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtistRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:255',
            'nacionalidade' => 'nullable|string|max:255',
            'data_nascimento' => 'nullable|date',
            'biografia' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O nome do artista é obrigatório.',
        ];
    }
}
