<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StorePositionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = Auth::user();
        return $user?->hasRole('admin', 'finance') ?? false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama_jabatan' => [
                'required',
                'string',
                Rule::unique('positions')
                    ->where(
                        fn($query) =>
                        $query->where('departement_id', $this->departement_id)
                    ),
            ],

            'nominal_tunjangan' => [
                'required',
                'numeric',
                'gt:0',
            ],

            'departement_id' => [
                'required',
                'exists:departements,id',
            ],
        ];
    }
    public function messages(): array
    {
        return [
            'nama_jabatan.required' => 'Nama jabatan wajib diisi.',
            'nama_jabatan.string' => 'Nama jabatan harus berupa teks.',
            'nama_jabatan.unique' => 'Nama jabatan sudah digunakan.',

            'nominal_tunjangan.required' => 'Nominal tunjangan wajib diisi.',
            'nominal_tunjangan.numeric' => 'Nominal tunjangan harus berupa angka.',
            'nominal_tunjangan.gt' => 'Nominal tunjangan harus lebih besar dari 0.',

            'departement_id.required' => 'Departemen wajib dipilih.',
            'departement_id.exists' => 'Departemen yang dipilih tidak valid.',
        ];
    }
}
