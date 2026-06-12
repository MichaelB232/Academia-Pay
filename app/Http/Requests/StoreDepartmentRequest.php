<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;


class StoreDepartmentRequest extends FormRequest
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
            'nama_departement' => 'required|unique:departements,nama_departement'
        ];
    }
    public function messages(): array
    {
        return [
            'nama_departement.required' => "Nama Departement wajib diisi",
            'nama_departement.unique' => "Nama Departement telah digunakan!"
        ];
    }
}
