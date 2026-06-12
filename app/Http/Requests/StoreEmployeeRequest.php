<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // return true;
        // $user = Auth::user();
        // $user = Auth::user();
        // dd(Auth::user());
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
            'nama_karyawan' => 'required',
            'position_id' => 'required',
            'niy' => 'required|unique:employees,niy',
            'gaji_pokok' => 'required|numeric|min:0'
        ];
    }
    public function messages(): array
    {
        return [
            'nama_karyawan.required' => 'Nama lengkap karyawan wajib diisi.',
            'nama_karyawan.string'   => 'Nama lengkap harus berupa teks.',

            'position_id.required'   => 'Jabatan wajib dipilih.',
            'position_id.exists'     => 'Jabatan yang dipilih tidak valid atau tidak terdaftar.',

            'niy.required'           => 'NIP / NIY wajib diisi.',
            'niy.unique'             => 'NIP / NIY ini sudah digunakan oleh karyawan lain.',

            'gaji_pokok.required'    => 'Gaji pokok awal wajib diisi.',
            'gaji_pokok.numeric'     => 'Gaji pokok harus berupa angka.',
            'gaji_pokok.min'         => 'Gaji pokok tidak boleh kurang dari 0.'
        ];
    }
}
