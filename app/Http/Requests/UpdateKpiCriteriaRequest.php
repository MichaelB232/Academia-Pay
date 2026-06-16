<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateKpiCriteriaRequest extends FormRequest
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
        // dd($this->route()->parameters());
        // $kpiCriteria = $this->route('kpiCriteria');

        return [
            'position_id' => [
                'required',
                'exists:positions,id'
            ],

            'nama_kriteria' => [
                'required',
                'string',
                Rule::unique('kpi_criterias')
                    ->where(function ($query) {
                        return $query->where(
                            'position_id',
                            $this->position_id
                        );
                    })
                    ->ignore($this->route('kpi_criterion')),
            ],

            'deskripsi' => [
                'required',
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
                Rule::in([
                    'percentage',
                    'sudah_belum'
                ])
            ],

            'jenis_tunjangan' => [
                'required',
                Rule::in([
                    'tunjangan_kedisiplinan',
                    'tunjangan_performa'
                ])
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'position_id.required' => 'Jabatan wajib dipilih.',
            'position_id.exists' => 'Jabatan tidak ditemukan.',

            'nama_kriteria.required' => 'Nama KPI wajib diisi.',
            'nama_kriteria.string' => 'Nama KPI harus berupa teks.',
            'nama_kriteria.unique' => 'Nama KPI sudah digunakan pada jabatan ini.',

            'deskripsi.required' => 'Deskripsi wajib diisi.',

            'bobot.required' => 'Bobot wajib diisi.',
            'bobot.numeric' => 'Bobot harus berupa angka.',
            'bobot.min' => 'Bobot minimal 0.',
            'bobot.max' => 'Bobot maksimal 100.',

            'metode_ukur.required' => 'Metode ukur wajib dipilih.',
            'metode_ukur.in' => 'Metode ukur tidak valid.',

            'jenis_tunjangan.required' => 'Jenis tunjangan wajib dipilih.',
            'jenis_tunjangan.in' => 'Jenis tunjangan tidak valid.',
        ];
    }
}
