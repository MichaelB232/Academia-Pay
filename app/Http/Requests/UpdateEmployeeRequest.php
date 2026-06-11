<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UpdateEmployeeRequest extends FormRequest
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
        $employee = $this->route('daftar-karyawan');
        // dd($this->route('daftar_karyawan'));
        return [
            'nama_karyawan' => 'required|string',
            'position_id' => 'required|exists:positions,id',
            'gaji_pokok' => 'required|numeric|min:0',
            'niy' => [
                'required',
                Rule::unique('employees')->ignore(
                    is_object($this->route('daftar_karyawan'))
                        ? $this->route('daftar_karyawan')->id
                        : $this->route('daftar_karyawan')
                )
            ]
        ];
    }
    public function messages(): array
    {
        return [
            'nama_karyawan.required' => "Nama lengkap karyawan wajib diisi",
            'nama_karyawan.string' => "Nama lengkap harus berupa teks",

            'position_id.required' => 'Jabatan Wajib dipilih',
            'position_id.exists' => "Jabatan yang dipilih tidak valida atau tidak ada",

            'niy.required' => 'NIP / NIY wajib diisi',
            'niy.unique' => 'NIP/NIY sudah digunakan oleh karyawan lain',

            'gaji_pokok.required'    => 'Gaji pokok wajib diisi.',
            'gaji_pokok.numeric'     => 'Gaji pokok harus berupa angka.',
            'gaji_pokok.min'         => 'Gaji pokok tidak boleh kurang dari 0.'
        ];
    }
}
