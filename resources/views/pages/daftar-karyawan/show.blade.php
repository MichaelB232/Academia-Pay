@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto space-y-6">

        <div class="flex justify-between items-center">
            <a href="{{ route('daftar-karyawan.index') }}"
                class="flex items-center gap-2 text-sm font-medium text-gray-500 hover:text-[#0a855c] transition">
                <i class="fa-solid fa-arrow-left"></i>
                <span>Kembali ke Daftar Karyawan</span>
            </a>

            <a href="{{ route('daftar-karyawan.edit', $employee->id) }}"
                class="bg-blue-500 text-white px-4 py-2 rounded-xl text-xs font-semibold flex items-center gap-2 hover:bg-blue-600 transition shadow-xs">
                <i class="fa-solid fa-pen"></i>
                <span>Edit Profil</span>
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="h-32 bg-[#0a855c]/10 border-b border-gray-100 relative">
                <div
                    class="absolute -bottom-10 left-8 w-24 h-24 bg-white rounded-full p-1 shadow-sm border border-gray-100 flex items-center justify-center">
                    <div class="w-full h-full bg-gray-100 rounded-full flex items-center justify-center text-gray-400">
                        <i class="fa-solid fa-user text-3xl"></i>
                    </div>
                </div>
            </div>

            <div class="pt-14 pb-6 px-8">
                <h2 class="text-2xl font-bold text-gray-800">{{ $employee->nama_karyawan }}</h2>
                <p class="text-sm text-gray-500 font-medium mt-0.5">NIY: {{ $employee->niy }}</p>
            </div>

            <div class="border-t border-gray-100 px-8 py-6 grid grid-cols-1 md:grid-cols-2 gap-6 text-sm">
                <div>
                    <label
                        class="block text-[10px] font-bold text-gray-400 tracking-wider uppercase mb-1">Departemen</label>
                    <p class="text-gray-800 font-medium bg-gray-50 px-4 py-2.5 rounded-xl border border-gray-100">
                        {{ $employee->position->departemen->nama_departemen }}
                    </p>
                </div>

                <div>
                    <label class="block text-[10px] font-bold text-gray-400 tracking-wider uppercase mb-1">Jabatan
                        Struktur</label>
                    <p class="text-gray-800 font-medium bg-gray-50 px-4 py-2.5 rounded-xl border border-gray-100">
                        {{ $employee->position->nama_jabatan }}
                    </p>
                </div>

                <div>
                    <label class="block text-[10px] font-bold text-gray-400 tracking-wider uppercase mb-1">Gaji Pokok
                        Kontrak Awal</label>
                    <p class="text-[#0a855c] font-bold bg-gray-50 px-4 py-2.5 rounded-xl border border-gray-100">
                        Rp {{ number_format($employee->gaji_pokok ?? 0, 0, ',', '.') }}
                    </p>
                </div>

                <div>
                    <label class="block text-[10px] font-bold text-gray-400 tracking-wider uppercase mb-1">Tanggal Terdaftar
                        Sistem</label>
                    <p class="text-gray-600 bg-gray-50 px-4 py-2.5 rounded-xl border border-gray-100">
                        {{ $employee->created_at ? $employee->created_at->translatedFormat('d F Y') : '-' }}
                    </p>
                </div>
            </div>

            <div
                class="bg-gray-50 px-8 py-4 border-t border-gray-100 flex justify-between items-center text-xs text-gray-400">
                <span>ID Record: #{{ $employee->id }}</span>
                <span>Terakhir Diperbarui: {{ $employee->updated_at ? $employee->updated_at->diffForHumans() : '-' }}</span>
            </div>
        </div>

    </div>
@endsection
