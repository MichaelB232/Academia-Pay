@extends('layouts.app')

@section('content')
    <div class="space-y-8">

        {{-- BIRO KEUANGAN --}}
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">
                Master Data: Biro Keuangan
            </h2>

            <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">

                {{-- Departemen --}}
                <div class="border border-gray-100 rounded-2xl p-5 flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-center mb-4">
                            <div class="flex items-center gap-2">
                                <h3 class="text-lg font-bold text-gray-800">Tabel Departement</h3>
                                <a href="{{ route('departement.index') }}"
                                    class="text-xs text-[#10b981] hover:underline font-medium flex items-center gap-1">
                                    Lihat Semua <i class="fa-solid fa-arrow-right text-[10px]"></i>
                                </a>
                            </div>

                            <a href="{{ route('departement.create') }}"
                                class="bg-[#10b981] hover:bg-[#0d9488] text-white px-5 py-2.5 rounded-xl text-sm font-semibold transition shadow-sm cursor-pointer">
                                <i class="fa-solid fa-plus mr-1"></i> Tambah
                            </a>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead>
                                    <tr class="bg-gray-50 text-gray-500 uppercase text-xs">
                                        <th class="p-3 text-left">Nama Departement</th>
                                        <th class="p-3 text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    @forelse ($departements as $departement)
                                        <tr>
                                            <td class="p-3 font-medium text-gray-700">
                                                {{ $departement->nama_departement }}
                                            </td>
                                            <td class="p-3 text-center">
                                                <a href="{{ route('departement.edit', $departement->id) }}"
                                                    class="px-4 py-2 bg-amber-50 text-amber-600 rounded-xl text-sm font-medium hover:bg-amber-100 transition">
                                                    Edit
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2" class="p-4 text-center text-gray-400">
                                                Tidak ada data departemen
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    @if (method_exists($departements, 'hasPages') && $departements->hasPages())
                        <div
                            class="flex justify-between items-center pt-4 border-t border-gray-50 mt-4 text-xs text-gray-500">
                            <p>{{ $departements->firstItem() }}-{{ $departements->lastItem() }} dari
                                {{ $departements->total() }}</p>
                            <div class="flex items-center gap-1">
                                <a href="{{ $departements->previousPageUrl() }}"
                                    class="px-2 py-1 bg-white border border-gray-200 rounded-lg {{ $departements->onFirstPage() ? 'opacity-40 cursor-not-allowed' : 'hover:border-[#10b981]' }}"><i
                                        class="fa-solid fa-chevron-left text-[10px]"></i></a>
                                @foreach ($departements as $element)
                                    @if (is_string($element))
                                        <span
                                            class="px-2 py-1 text-gray-400 text-xs font-semibold">{{ $element }}</span>
                                    @endif
                                    @if (is_array($element))
                                        @foreach ($element as $page => $url)
                                            <a href="{{ $url }}"
                                                class="px-2.5 py-1 rounded-lg {{ $page == $departements->currentPage() ? 'bg-[#10b981] text-white font-bold' : 'bg-white border border-gray-200' }}">{{ $page }}</a>
                                        @endforeach
                                    @endif
                                @endforeach
                                <a href="{{ $departements->nextPageUrl() }}"
                                    class="px-2 py-1 bg-white border border-gray-200 rounded-lg {{ !$departements->hasMorePages() ? 'opacity-40 cursor-not-allowed' : 'hover:border-[#10b981]' }}"><i
                                        class="fa-solid fa-chevron-right text-[10px]"></i></a>
                            </div>
                        </div>
                    @endif
                </div>

                {{-- Jabatan --}}
                <div class="border border-gray-100 rounded-2xl p-5 flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-center mb-4">
                            <div class="flex items-center gap-2">
                                <h3 class="text-lg font-bold text-gray-800">Tabel Jabatan</h3>
                                <a href="{{ route('position.index') }}"
                                    class="text-xs text-[#10b981] hover:underline font-medium flex items-center gap-1">
                                    Lihat Semua <i class="fa-solid fa-arrow-right text-[10px]"></i>
                                </a>
                            </div>
                            <a href="{{ route('position.create') }}"
                                class="bg-[#10b981] hover:bg-[#0d9488] text-white px-5 py-2.5 rounded-xl text-sm font-semibold transition shadow-sm cursor-pointer">
                                <i class="fa-solid fa-plus mr-1"></i> Tambah
                            </a>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead>
                                    <tr class="bg-gray-50 text-gray-500 uppercase text-xs">
                                        <th class="p-3 text-left">Nama Jabatan</th>
                                        <th class="p-3 text-left">Departemen</th>
                                        <th class="p-3 text-left">Tunjangan</th>
                                        <th class="p-3 text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    @forelse ($positions as $position)
                                        <tr>
                                            <td class="p-3 font-medium text-gray-700">
                                                {{ $position->nama_jabatan }}
                                            </td>
                                            <td class="p-3 text-gray-600">
                                                {{ $position->departement->nama_departement ?? '-' }}
                                            </td>
                                            <td class="p-3 text-gray-600">
                                                Rp {{ number_format($position->nominal_tunjangan, 0, ',', '.') }}
                                            </td>
                                            <td class="p-3 text-center">
                                                <a href="{{ route('position.edit', $position->id) }}"
                                                    class="px-4 py-2 bg-amber-50 text-amber-600 rounded-xl text-sm font-medium hover:bg-amber-100 transition">
                                                    Edit
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="p-4 text-center text-gray-400">
                                                Tidak ada data jabatan
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    @if (method_exists($positions, 'hasPages') && $positions->hasPages())
                        <div
                            class="flex justify-between items-center pt-4 border-t border-gray-50 mt-4 text-xs text-gray-500">
                            <p>{{ $positions->firstItem() }}-{{ $positions->lastItem() }} dari {{ $positions->total() }}
                            </p>
                            <div class="flex items-center gap-1">
                                <a href="{{ $positions->previousPageUrl() }}"
                                    class="px-2 py-1 bg-white border border-gray-200 rounded-lg {{ $positions->onFirstPage() ? 'opacity-40 cursor-not-allowed' : 'hover:border-[#10b981]' }}"><i
                                        class="fa-solid fa-chevron-left text-[10px]"></i></a>
                                @foreach ($positions as $element)
                                    @if (is_string($element))
                                        <span
                                            class="px-2 py-1 text-gray-400 text-xs font-semibold">{{ $element }}</span>
                                    @endif
                                    @if (is_array($element))
                                        @foreach ($element as $page => $url)
                                            <a href="{{ $url }}"
                                                class="px-2.5 py-1 rounded-lg {{ $page == $positions->currentPage() ? 'bg-[#10b981] text-white font-bold' : 'bg-white border border-gray-200' }}">{{ $page }}</a>
                                        @endforeach
                                    @endif
                                @endforeach
                                <a href="{{ $positions->nextPageUrl() }}"
                                    class="px-2 py-1 bg-white border border-gray-200 rounded-lg {{ !$positions->hasMorePages() ? 'opacity-40 cursor-not-allowed' : 'hover:border-[#10b981]' }}"><i
                                        class="fa-solid fa-chevron-right text-[10px]"></i></a>
                            </div>
                        </div>
                    @endif
                </div>

            </div>
        </div>

        {{-- BIRO SDM --}}
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">
                Master Data: Biro SDM
            </h2>

            <div class="border border-gray-100 rounded-2xl p-5 flex flex-col justify-between">
                <div>
                    <h3 class="text-lg font-bold text-gray-800 mb-4">
                        Tabel Integrasi KPI Jabatan
                    </h3>

                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="bg-gray-50 text-gray-500 uppercase text-xs">
                                    <th class="p-3 text-left">Nama Jabatan</th>
                                    <th class="p-3 text-left">Departemen</th>
                                    <th class="p-3 text-left">Status KPI</th>
                                    <th class="p-3 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse ($positions as $position)
                                    <tr>
                                        <td class="p-3 font-medium text-gray-700">
                                            {{ $position->nama_jabatan }}
                                        </td>
                                        <td class="p-3 text-gray-600">
                                            {{ $position->departement->nama_departement ?? '-' }}
                                        </td>
                                        <td class="p-3">
                                            <span
                                                class="px-3 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-700">
                                                Active
                                            </span>
                                        </td>
                                        <td class="p-3 text-center">
                                            <a href="{{ route('kpi-criteria.position', $position) }}"
                                                class="px-4 py-2 bg-[#10b981]/10 text-[#10b981] rounded-xl text-sm font-medium hover:bg-[#10b981]/20 transition">
                                                Kelola KPI
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="p-4 text-center text-gray-400">
                                            Tidak ada data KPI
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                @if (method_exists($positions, 'hasPages') && $positions->hasPages())
                    <div class="flex justify-between items-center pt-4 border-t border-gray-50 mt-4 text-xs text-gray-500">
                        <p>{{ $positions->firstItem() }}-{{ $positions->lastItem() }} dari {{ $positions->total() }}</p>
                        <div class="flex items-center gap-1">
                            <a href="{{ $positions->previousPageUrl() }}"
                                class="px-2 py-1 bg-white border border-gray-200 rounded-lg {{ $positions->onFirstPage() ? 'opacity-40 cursor-not-allowed' : 'hover:border-[#10b981]' }}"><i
                                    class="fa-solid fa-chevron-left text-[10px]"></i></a>
                            @foreach ($positions as $element)
                                @if (is_string($element))
                                    <span class="px-2 py-1 text-gray-400 text-xs font-semibold">{{ $element }}</span>
                                @endif
                                @if (is_array($element))
                                    @foreach ($element as $page => $url)
                                        <a href="{{ $url }}"
                                            class="px-2.5 py-1 rounded-lg {{ $page == $positions->currentPage() ? 'bg-[#10b981] text-white font-bold' : 'bg-white border border-gray-200' }}">{{ $page }}</a>
                                    @endforeach
                                @endif
                            @endforeach
                            <a href="{{ $positions->nextPageUrl() }}"
                                class="px-2 py-1 bg-white border border-gray-200 rounded-lg {{ !$positions->hasMorePages() ? 'opacity-40 cursor-not-allowed' : 'hover:border-[#10b981]' }}"><i
                                    class="fa-solid fa-chevron-right text-[10px]"></i></a>
                        </div>
                    </div>
                @endif
            </div>
        </div>

    </div>
@endsection
