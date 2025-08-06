<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDentalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'contractId' => 'required|integer',
            'startDate' => 'required|date',
            'endDate' => 'required|date|after_or_equal:start_date',
            'contractorId' => 'required|integer',
            'insuredName' => 'required|string|max:255',
            'identification' => 'required|string|max:15',
            'affiliateTypeId' => 'required|in:1,2',
            'familyCompositionId' => 'required|in:1,2,3',
            'serviceId' => 'required|integer',
            'holderId' => 'nullable|string|max:30',
            'dependents' => 'nullable|array',
            'registrationCode' => 'nullable|string|max:30',
        ];
    }



    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new \Illuminate\Http\Exceptions\HttpResponseException(
            response()->json([
                'success' => false,
                'message' => 'Faltan campos requeridos',
                'errors' => $validator->errors(),
            ], 400)
        );
    }

    public function validationData(): array
    {
        $data = $this->all();

        return [
            'contractId' => $data['contrato_id'] ?? null,
            'startDate' => $data['desde'] ?? null,
            'endDate' => $data['hasta'] ?? null,
            'contractorId' => $data['contratante_id'] ?? null,
            'insuredName' => $data['afiliado'] ?? null,
            'identification' => $data['identificacion'] ?? null,
            'affiliateTypeId' => $data['tipo_afiliado_id'] ?? null,
            'familyCompositionId' => $data['composicion_id'] ?? null,
            'serviceId' => $data['servicio_id'] ?? null,
            'holderId' => $data['titular_id'] ?? null,
            'dependents' => $data['dependientes'] ?? null,
            'registrationCode' => $data['codigo_registro'] ?? null,
        ];
    }

}
