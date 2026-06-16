<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreKpiCriteriaRequest extends FormRequest
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
            'position_id' => 'required|exists:positions,id',
            'nama_kriteria' => [
                'required',
                'string',
                'max:255',
                Rule::unique('kpi_criterias')->where(fn($q) =>
                $q->where('position_id', $this->position_id))
            ],

            'deskripsi' => [
                'nullable',
                'string'
            ],

            'bobot' => [
                'required',
                'numeric',
                'min:0',
                'max:100'
            ],

            'metode_ukur' => [
                'required',
                'in:percentage,sudah_belum'
            ],

            'jenis_tunjangan' => [
                'required',
                'in:tunjangan_kedisiplinan,tunjangan_performa'
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'nama_kriteria.required' => 'Nama KPI wajib diisi.',
            'nama_kriteria.string' => 'Nama KPI harus berupa teks.',
            'nama_kriteria.max' => 'Nama KPI maksimal 255 karakter.',

            'deskripsi.string' => 'Deskripsi harus berupa teks.',

            'bobot.required' => 'Bobot KPI wajib diisi.',
            'bobot.numeric' => 'Bobot KPI harus berupa angka.',
            'bobot.min' => 'Bobot KPI minimal 0%.',
            'bobot.max' => 'Bobot KPI maksimal 100%.',

            'metode_ukur.required' => 'Metode ukur wajib dipilih.',
            'metode_ukur.in' => 'Metode ukur tidak valid.',

            'jenis_tunjangan.required' => 'Integrasi tunjangan wajib dipilih.',
            'jenis_tunjangan.in' => 'Integrasi tunjangan tidak valid.',
        ];
    }
}
