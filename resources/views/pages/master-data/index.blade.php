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
                <div class="border border-gray-100 rounded-2xl p-5">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-bold text-gray-800">
                            Tabel Departemen
                        </h3>

                        <a href="{{ route('departement.create') }}"
                            class="bg-[#10b981] hover:bg-[#0d9488] text-white px-5 py-2.5 rounded-xl text-sm font-semibold transition shadow-sm">
                            <i class="fa-solid fa-plus mr-1"></i>
                            Tambah
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="bg-gray-50 text-gray-500 uppercase text-xs">
                                    <th class="p-3 text-left">Nama Departemen</th>
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

                {{-- Jabatan --}}
                <div class="border border-gray-100 rounded-2xl p-5">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-bold text-gray-800">
                            Tabel Jabatan
                        </h3>
                        <a href="{{ route('position.create') }}"
                            class="bg-[#10b981] hover:bg-[#0d9488] text-white px-5 py-2.5 rounded-xl text-sm font-semibold transition shadow-sm">
                            <i class="fa-solid fa-plus mr-1"></i>
                            Tambah
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
                                            {{ $position->departement->nama_departement }}
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

            </div>
        </div>

        {{-- BIRO SDM --}}
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">
                Master Data: Biro SDM
            </h2>

            <div class="border border-gray-100 rounded-2xl p-5">
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
                                        {{ $position->departement->nama_departement }}
                                    </td>

                                    <td class="p-3">
                                        <span
                                            class="px-3 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-700">
                                            Active
                                        </span>
                                    </td>

                                    <td class="p-3 text-center">
                                        {{-- <a href="{{ route('kpi.index', $position->id) }}"
                                            class="px-4 py-2 bg-[#10b981]/10 text-[#10b981] rounded-xl text-sm font-medium hover:bg-[#10b981]/20 transition"> --}}
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
        </div>

    </div>
@endsection
