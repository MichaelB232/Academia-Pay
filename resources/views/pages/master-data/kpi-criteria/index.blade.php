@extends('layouts.app')

@section('content')
    <div class="space-y-6">

        {{-- Back Button --}}
        <div>
            <a href="{{ route('master-data.index') }}"
                class="inline-flex items-center gap-2 text-[#0a855c] hover:text-[#08734f] font-medium transition">
                <i class="fa-solid fa-arrow-left"></i>
                Kembali ke Master Data
            </a>
        </div>

        {{-- Position Information --}}
        <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4">

                <div>
                    <h2 class="text-3xl font-bold text-gray-800">
                        {{ $position->nama_jabatan }}
                    </h2>

                    <p class="text-gray-500 mt-1">
                        Departement:
                        {{ $position->departement->nama_departement }}
                    </p>
                </div>

                <div>
                    <a href="{{ route('kpi-criteria.create', $position->id) }}"
                        class="bg-[#10b981] text-white px-5 py-3 rounded-xl font-semibold hover:bg-[#0d9488] transition shadow-sm">
                        <i class="fa-solid fa-plus mr-2"></i>
                        Tambah Indikator KPI
                    </a>
                </div>

            </div>
        </div>

        {{-- KPI Table --}}
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">

            <div class="mb-5">
                <h3 class="text-xl font-bold text-gray-800">
                    Daftar Indikator Penilaian
                </h3>
            </div>

            <div class="overflow-x-auto">

                <table class="w-full text-left text-sm">

                    <thead>
                        <tr class="bg-gray-100 text-gray-600 uppercase text-xs tracking-wider">
                            <th class="p-4 rounded-l-xl">Nama Indikator</th>
                            <th class="p-4">Deskripsi</th>
                            <th class="p-4">Bobot (%)</th>
                            <th class="p-4 text-center rounded-r-xl">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100">

                        @forelse ($kpiCriterias as $criteria)
                            <tr class="hover:bg-gray-50 transition">

                                <td class="p-4 font-semibold text-gray-800">
                                    {{ $criteria->nama_kriteria }}
                                </td>

                                <td class="p-4 text-gray-600">
                                    {{ $criteria->deskripsi }}
                                </td>

                                <td class="p-4 font-semibold text-[#0a855c]">
                                    {{ number_format($criteria->bobot, 2) }}
                                </td>

                                <td class="p-4">
                                    <div class="flex justify-center items-center gap-3">

                                        <a href="{{ route('kpi-criteria.edit', $criteria->id) }}"
                                            class="text-blue-500 hover:text-blue-700 transition">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>

                                        <form action="{{ route('kpi-criteria.destroy', $criteria->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus indikator KPI ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="text-red-500 hover:text-red-700 transition cursor-pointer">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>

                                        </form>

                                    </div>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-8 text-gray-400">
                                    Belum ada indikator KPI yang terdaftar.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

            {{-- Pagination --}}
            @if ($kpiCriterias instanceof \Illuminate\Pagination\LengthAwarePaginator)
                <div
                    class="flex flex-col sm:flex-row justify-between items-center gap-4 pt-5 mt-5 border-t border-gray-100">

                    <p class="text-xs text-gray-500">
                        Menampilkan
                        {{ $kpiCriterias->firstItem() ?? 0 }}
                        -
                        {{ $kpiCriterias->lastItem() ?? 0 }}
                        dari
                        {{ $kpiCriterias->total() }}
                        data
                    </p>

                    {{ $kpiCriterias->links() }}
                </div>
            @endif

        </div>

    </div>
@endsection
