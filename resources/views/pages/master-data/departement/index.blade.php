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
                <h2 class="text-xl font-bold text-gray-800">Daftar Departement</h2>
                <p class="text-xs text-gray-400 mt-0.5">Kelola data struktur departement sekolah</p>
            </div>

            <div class="flex gap-3 w-full sm:w-auto justify-end">
                <a href="{{ route('master-data.index') }}"
                    class="bg-gray-100 text-gray-600 px-4 py-2.5 rounded-xl text-sm font-semibold hover:bg-gray-200 transition text-center">
                    <i class="fa-solid fa-arrow-left mr-1"></i> Kembali
                </a>
                <a href="{{ route('departement.create') }}"
                    class="bg-[#10b981] text-white px-5 py-2.5 rounded-xl text-sm font-semibold flex items-center justify-center gap-2 hover:bg-[#0d9488] transition shadow-xs cursor-pointer">
                    <i class="fa-solid fa-plus"></i>
                    <span>Tambah Departement</span>
                </a>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm border-separate border-spacing-y-2">
                    <thead>
                        <tr class="text-gray-400 font-semibold text-xs tracking-wider uppercase border-b border-gray-100">
                            <th class="pb-4 pl-4">Nama Departement</th>
                            <th class="pb-4">Tanggal Dibuat</th>
                            <th class="pb-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse ($departements as $dept)
                            <tr class="hover:bg-gray-50/50 transition">
                                <td class="py-4 pl-4 font-semibold text-gray-800">
                                    {{ $dept->nama_departement }}
                                </td>
                                <td class="py-4 text-gray-600">
                                    {{ $dept->created_at ? $dept->created_at->format('d M Y') : '-' }}
                                </td>
                                <td class="py-4 text-center">
                                    <div class="flex items-center justify-center gap-4">
                                        <a href="{{ route('departement.edit', $dept->id) }}"
                                            class="text-blue-500 hover:text-blue-700 transition">
                                            <i class="fa-solid fa-pen text-base"></i>
                                        </a>
                                        <form action="{{ route('departement.destroy', $dept->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus departemen ini? Jabatan yang terkait mungkin akan ikut terpengaruh.')">
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
                                <td colspan="3" class="py-8 text-center text-gray-400 font-medium">
                                    Belum ada data departemen yang tersimpan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if (method_exists($departements, 'hasPages') && $departements->hasPages())
                <div
                    class="flex flex-col sm:flex-row justify-between items-center gap-4 pt-6 border-t border-gray-100 mt-4 text-xs text-gray-500">
                    <p>Menampilkan {{ $departements->firstItem() ?? 0 }} - {{ $departements->lastItem() ?? 0 }} dari
                        {{ $departements->total() }} data</p>
                    <div class="flex items-center gap-1">
                        <a href="{{ $departements->previousPageUrl() }}"
                            class="px-2 py-1 bg-white border border-gray-200 rounded-lg {{ $departements->onFirstPage() ? 'opacity-40 cursor-not-allowed' : 'hover:border-[#10b981]' }}"><i
                                class="fa-solid fa-chevron-left text-[10px]"></i></a>
                        @for ($i = 1; $i <= $departements->lastPage(); $i++)
                            <a href="{{ $departements->url($i) }}"
                                class="px-2.5 py-1 rounded-lg {{ $i == $departements->currentPage() ? 'bg-[#10b981] text-white font-bold' : 'bg-white border border-gray-200' }}">{{ $i }}</a>
                        @endfor
                        <a href="{{ $departements->nextPageUrl() }}"
                            class="px-2 py-1 bg-white border border-gray-200 rounded-lg {{ !$departements->hasMorePages() ? 'opacity-40 cursor-not-allowed' : 'hover:border-[#10b981]' }}"><i
                                class="fa-solid fa-chevron-right text-[10px]"></i></a>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
