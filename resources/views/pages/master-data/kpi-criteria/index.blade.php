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
        {{-- Header --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <div class="flex justify-between items-center">

                <div>
                    <h1 class="text-3xl font-bold text-gray-800">
                        {{ strtoupper($position->nama_jabatan) }}
                    </h1>

                    <div class="flex items-center gap-2 mt-1">
                        <span class="text-gray-500">
                            {{ $position->departement->nama_departement }}
                        </span>

                        <span class="w-2 h-2 rounded-full bg-green-500"></span>

                        <span class="text-sm font-medium text-green-600">
                            Active
                        </span>
                    </div>
                </div>

                <a href="{{ route('kpi-criteria.create', $position->id) }}"
                    class="bg-[#10b981] hover:bg-[#0d9488] text-white px-5 py-3 rounded-xl font-semibold transition shadow-sm">
                    <i class="fa-solid fa-plus mr-2"></i>
                    Tambah KPI
                </a>

            </div>
        </div>

        {{-- KPI List --}}
        <div class="space-y-4">

            @forelse ($kpis as $kpi)
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">

                    <div class="flex justify-between items-center">

                        <div class="flex-1">

                            <h3 class="text-xl font-bold text-gray-800">
                                {{ strtoupper($kpi->nama_kriteria) }}
                            </h3>

                            <p class="text-sm text-gray-500 mt-1">
                                {{ $kpi->deskripsi }}
                            </p>

                        </div>

                        <div class="flex items-center gap-4">

                            {{-- Integrasi --}}
                            <div
                                class="px-4 py-2 rounded-lg bg-green-100 text-green-700 text-xs font-semibold min-w-[180px] text-center">

                                {{ strtoupper($kpi->jenis_tunjangan) }}

                            </div>

                            {{-- Bobot --}}
                            <div
                                class="px-4 py-2 rounded-lg bg-blue-100 text-blue-700 text-xs font-semibold min-w-[120px] text-center">

                                BOBOT: {{ $kpi->bobot }}%

                            </div>

                            {{-- Edit --}}
                            <a href="{{ route('kpi-criteria.edit', $kpi->id) }}"
                                class="w-11 h-11 rounded-xl bg-gray-100 hover:bg-amber-100 flex items-center justify-center transition">

                                <i class="fa-solid fa-pen-to-square text-amber-600 text-lg"></i>

                            </a>

                        </div>

                    </div>

                </div>

            @empty

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-12 text-center">

                    <div class="text-5xl text-gray-300 mb-3">
                        <i class="fa-solid fa-chart-line"></i>
                    </div>

                    <h3 class="font-bold text-gray-700 text-lg">
                        Belum Ada KPI
                    </h3>

                    <p class="text-gray-500 text-sm mt-1">
                        Tambahkan indikator KPI untuk jabatan ini.
                    </p>

                </div>
            @endforelse

        </div>

        {{-- Footer Action --}}
        @if ($kpis->count())
            <div class="flex justify-end gap-4 pt-4">

                <a href="{{ route('master-data.index') }}"
                    class="px-6 py-3 bg-gray-100 text-gray-600 rounded-xl font-semibold hover:bg-gray-200 transition">
                    Kembali
                </a>

            </div>
        @endif
    </div>
@endsection
