@extends('layouts.app')

@section('content')
    <div class="space-y-6">

        @if (session('success'))
            <div
                class="max-w-full bg-emerald-50 border border-emerald-200 text-emerald-800 p-4 rounded-xl text-xs font-semibold flex items-center gap-2 shadow-xs transition-all">
                <i class="fa-solid fa-circle-check text-emerald-600 text-sm"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <div
            class="bg-white rounded-2xl p-4 shadow-sm border border-gray-100 flex flex-col sm:flex-row justify-between items-center gap-4">
            <div>
                <h2 class="text-xl font-bold text-gray-800">Daftar Jabatan & Tunjangan</h2>
                <p class="text-xs text-gray-400 mt-0.5">Kelola nominal tunjangan serta integrasi struktural jabatan</p>
            </div>

            <div class="flex gap-3 w-full sm:w-auto justify-end">
                <a href="{{ route('master-data.index') }}"
                    class="bg-gray-100 text-gray-600 px-4 py-2.5 rounded-xl text-sm font-semibold hover:bg-gray-200 transition text-center">
                    <i class="fa-solid fa-arrow-left mr-1"></i> Kembali
                </a>
                <a href="{{ route('position.create') }}"
                    class="bg-[#10b981] text-white px-5 py-2.5 rounded-xl text-sm font-semibold flex items-center justify-center gap-2 hover:bg-[#0d9488] transition shadow-xs cursor-pointer">
                    <i class="fa-solid fa-plus"></i>
                    <span>Tambah Jabatan</span>
                </a>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm border-separate border-spacing-y-2">
                    <thead>
                        <tr class="text-gray-400 font-semibold text-xs tracking-wider uppercase border-b border-gray-100">
                            <th class="pb-4 pl-4">Nama Jabatan</th>
                            <th class="pb-4">Departement</th>
                            <th class="pb-4">Nominal Tunjangan</th>
                            <th class="pb-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse ($positions as $position)
                            <tr class="hover:bg-gray-50/50 transition">
                                <td class="py-4 pl-4 font-semibold text-gray-800">
                                    {{ $position->nama_jabatan }}
                                </td>
                                <td class="py-4 text-gray-600">
                                    {{ $position->departement->nama_departement ?? '-' }}
                                </td>
                                <td class="py-4 text-emerald-600 font-medium">
                                    Rp {{ number_format($position->nominal_tunjangan, 0, ',', '.') }}
                                </td>
                                <td class="py-4 text-center">
                                    <div class="flex items-center justify-center gap-4">
                                        <a href="{{ route('position.edit', $position->id) }}"
                                            class="text-blue-500 hover:text-blue-700 transition">
                                            <i class="fa-solid fa-pen text-base"></i>
                                        </a>
                                        <form action="{{ route('position.destroy', $position->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus data jabatan ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-400 hover:text-red-600 transition cursor-pointer">
                                                <i class="fa-solid fa-trash-can text-base"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-8 text-center text-gray-400 font-medium">
                                    Belum ada data jabatan yang tersimpan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if (method_exists($positions, 'hasPages') && $positions->hasPages())
                <div
                    class="flex flex-col sm:flex-row justify-between items-center gap-4 pt-6 border-t border-gray-100 mt-4 text-xs text-gray-500">
                    <p>Menampilkan {{ $positions->firstItem() ?? 0 }} - {{ $positions->lastItem() ?? 0 }} dari
                        {{ $positions->total() }} data</p>
                    <div class="flex items-center gap-1">
                        <a href="{{ $positions->previousPageUrl() }}"
                            class="px-2 py-1 bg-white border border-gray-200 rounded-lg {{ $positions->onFirstPage() ? 'opacity-40 cursor-not-allowed' : 'hover:border-[#10b981]' }}"><i
                                class="fa-solid fa-chevron-left text-[10px]"></i></a>
                        @for ($i = 1; $i <= $positions->lastPage(); $i++)
                            <a href="{{ $positions->url($i) }}"
                                class="px-2.5 py-1 rounded-lg {{ $i == $positions->currentPage() ? 'bg-[#10b981] text-white font-bold' : 'bg-white border border-gray-200' }}">{{ $i }}</a>
                        @endfor
                        <a href="{{ $positions->nextPageUrl() }}"
                            class="px-2 py-1 bg-white border border-gray-200 rounded-lg {{ !$positions->hasMorePages() ? 'opacity-40 cursor-not-allowed' : 'hover:border-[#10b981]' }}"><i
                                class="fa-solid fa-chevron-right text-[10px]"></i></a>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
