<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LogisticaRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'obra_id' => 'required|exists:obras,id',
            'exposicao_id' => 'nullable|exists:exposicaos,id',
            'status' => 'nullable|string|max:100',
            'data_movimentacao' => 'nullable|date',
            'responsavel' => 'nullable|string|max:255',
            'telefone' => 'nullable|string|max:30',
            'local_origem' => 'nullable|string|max:255',
            'local_destino' => 'nullable|string|max:255',
            'detalhes' => 'nullable|string',
        ];
    }
}
