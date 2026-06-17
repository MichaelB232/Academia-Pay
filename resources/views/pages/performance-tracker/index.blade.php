@extends('layouts.app')

@section('content')
    {{-- ── Summary Cards ── --}}
    <div class="grid grid-cols-3 gap-4 mb-6">

        {{-- Card 1: Donut --}}
        <div class="bg-white rounded-xl border border-gray-200 p-5">
            <p class="text-sm font-semibold text-gray-800 mb-4">Distribusi Skor Akhir</p>
            <div class="flex items-center gap-4">
                <svg width="90" height="90" viewBox="0 0 90 90" class="flex-shrink-0">
                    @php
                        $r = 35;
                        $cx = 45;
                        $cy = 45;
                        $circ = 2 * M_PI * $r;
                        $sb = (74 / 100) * $circ;
                        $b = (24 / 100) * $circ;
                        $c = (2 / 100) * $circ;
                        $gap = 2;
                    @endphp
                    <circle cx="{{ $cx }}" cy="{{ $cy }}" r="{{ $r }}" fill="none"
                        stroke="#e5e7eb" stroke-width="10" />
                    <circle cx="{{ $cx }}" cy="{{ $cy }}" r="{{ $r }}" fill="none"
                        stroke="#16a34a" stroke-width="10" stroke-dasharray="{{ $sb - $gap }} {{ $circ }}"
                        stroke-dashoffset="{{ $circ / 4 }}"
                        transform="rotate(-90 {{ $cx }} {{ $cy }})" />
                    <circle cx="{{ $cx }}" cy="{{ $cy }}" r="{{ $r }}" fill="none"
                        stroke="#f59e0b" stroke-width="10" stroke-dasharray="{{ $b - $gap }} {{ $circ }}"
                        stroke-dashoffset="{{ $circ / 4 - $sb }}"
                        transform="rotate(-90 {{ $cx }} {{ $cy }})" />
                    <circle cx="{{ $cx }}" cy="{{ $cy }}" r="{{ $r }}" fill="none"
                        stroke="#ef4444" stroke-width="10" stroke-dasharray="{{ $c - $gap }} {{ $circ }}"
                        stroke-dashoffset="{{ $circ / 4 - $sb - $b }}"
                        transform="rotate(-90 {{ $cx }} {{ $cy }})" />
                    <text x="{{ $cx }}" y="{{ $cy - 4 }}" text-anchor="middle" font-size="16"
                        font-weight="700" fill="#111827">50</text>
                    <text x="{{ $cx }}" y="{{ $cy + 10 }}" text-anchor="middle" font-size="9"
                        fill="#9ca3af">KARYAWAN</text>
                </svg>
                <div class="flex flex-col gap-2 text-sm text-gray-600">
                    <div class="flex items-center justify-between gap-3">
                        <div class="flex items-center gap-1.5">
                            <span class="w-2.5 h-2.5 rounded-full bg-green-600 inline-block"></span>
                            <span>Sangat Baik (A)</span>
                        </div>
                        <span class="font-semibold text-gray-800">74%</span>
                    </div>
                    <div class="flex items-center justify-between gap-3">
                        <div class="flex items-center gap-1.5">
                            <span class="w-2.5 h-2.5 rounded-full bg-amber-400 inline-block"></span>
                            <span>Baik (B)</span>
                        </div>
                        <span class="font-semibold text-gray-800">24%</span>
                    </div>
                    <div class="flex items-center justify-between gap-3">
                        <div class="flex items-center gap-1.5">
                            <span class="w-2.5 h-2.5 rounded-full bg-red-500 inline-block"></span>
                            <span>Cukup (C)</span>
                        </div>
                        <span class="font-semibold text-gray-800">2%</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Card 2: KPI --}}
        <div class="bg-white rounded-xl border border-gray-200 p-5 relative overflow-hidden">
            <div class="absolute -top-3 -right-3 w-20 h-20 rounded-full bg-green-100 flex items-center justify-center">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none">
                    <path
                        d="M12 2l1.5 6.5L20 7l-4 5.5 5.5 2.5-5.5 1.5L17 22l-5-3.5L7 22l1.5-5.5L3 15l5.5-2.5L4 7l6.5 1.5L12 2z"
                        fill="#16a34a" opacity="0.5" />
                </svg>
            </div>
            <p class="text-sm text-gray-500 leading-tight mb-1">Rata-rata<br>Skor KPI</p>
            <p class="text-5xl font-bold text-gray-900 mb-3">82.6</p>
            <span class="inline-block bg-green-700 text-white text-sm font-medium px-3 py-1 rounded-md mb-2">
                Kategori : Sangat Baik
            </span>
            <p class="text-sm text-green-600 font-medium">↑ +1.4% Dari Bulan Lalu</p>
        </div>

        {{-- Card 3: Discipline --}}
        <div class="bg-white rounded-xl border border-gray-200 p-5 relative overflow-hidden">
            <div class="absolute -top-3 -right-3 w-20 h-20 rounded-full bg-amber-100 flex items-center justify-center">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none">
                    <circle cx="12" cy="12" r="9" stroke="#d97706" stroke-width="2" opacity="0.6" />
                    <path d="M12 7v5l3 3" stroke="#d97706" stroke-width="2" stroke-linecap="round" opacity="0.6" />
                </svg>
            </div>
            <p class="text-sm text-gray-500 leading-tight mb-1">Rata-rata<br>kedisiplinan</p>
            <p class="text-5xl font-bold text-gray-900 mb-3">92.2%</p>
            <p class="text-sm text-amber-600 font-medium">↑ +2.2% Peningkatan<br>dari bulan lalu</p>
        </div>

    </div>

    {{-- ── Table Section ── --}}
    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">

        {{-- Header --}}
        <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100 flex-wrap gap-3">
            <p class="text-base font-bold text-gray-800">Daftar Evaluasi Individu</p>
            <div class="flex items-center gap-2">
                <button
                    class="flex items-center gap-1.5 px-3 py-1.5 border border-gray-300 rounded-lg text-sm text-gray-700 bg-white hover:bg-gray-50">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <rect x="3" y="4" width="18" height="18" rx="2" />
                        <line x1="16" y1="2" x2="16" y2="6" />
                        <line x1="8" y1="2" x2="8" y2="6" />
                        <line x1="3" y1="10" x2="21" y2="10" />
                    </svg>
                    Periode: {{ \Carbon\Carbon::createFromDate(null, $current_period->bulan, 1)->locale('id')->monthName }}
                    {{ $current_period->tahun }}
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.5">
                        <polyline points="6 9 12 15 18 9" />
                    </svg>
                </button>
                <input type="text" placeholder="Cari nama atau NIP Karyawan..."
                    class="px-3 py-1.5 border border-gray-300 rounded-lg text-sm w-56 focus:outline-none focus:border-green-600 placeholder-gray-400">
                <button
                    class="flex items-center gap-1.5 px-4 py-1.5 bg-amber-600 hover:bg-amber-700 text-white text-sm font-medium rounded-lg">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <polyline points="6 9 6 2 18 2 18 9" />
                        <path d="M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2" />
                        <rect x="6" y="14" width="12" height="8" />
                    </svg>
                    Cetak
                </button>
            </div>
        </div>

        {{-- Table --}}
        <table class="w-full">
            <thead>
                <tr class="bg-gray-50">
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wide">Karyawan
                    </th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wide">Departemen
                    </th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wide">
                        <span class="flex items-center gap-1">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <circle cx="12" cy="12" r="9" />
                                <polyline points="12 7 12 12 15 15" />
                            </svg>
                            Kedisiplinan
                        </span>
                    </th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wide">Pencapaian
                        KPI</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-gray-500 uppercase tracking-wide">Skor
                        Akhir</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wide">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($employees_assessments as $emp)
                    @php
                        $disc = $emp->disciplineAssessments->first()?->skor_kedisiplinan ?? 0;
                        $kpi = $emp->kpiAssessments->avg('skor_kpi') ?? 0;
                        $score = round($disc * 0.4 + $kpi * 0.6);

                        $disc_color = $disc >= 80 ? 'bg-green-500' : ($disc >= 50 ? 'bg-amber-400' : 'bg-red-500');
                        $kpi_color = $kpi >= 80 ? 'bg-green-500' : ($kpi >= 50 ? 'bg-blue-500' : 'bg-red-500');

                        if ($score >= 85) {
                            $grade = 'Sangat Baik';
                            $badge = 'bg-green-100 text-green-800';
                        } elseif ($score >= 70) {
                            $grade = 'Baik';
                            $badge = 'bg-amber-100 text-amber-800';
                        } else {
                            $grade = 'Cukup';
                            $badge = 'bg-red-100 text-red-800';
                        }

                        $initials = collect(explode(' ', $emp->nama_karyawan))
                            ->take(2)
                            ->map(fn($w) => strtoupper($w[0]))
                            ->join('');
                    @endphp
                    <tr class="hover:bg-gray-50">
                        {{-- Employee --}}
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-2.5">
                                <div
                                    class="w-9 h-9 rounded-full bg-green-100 flex items-center justify-center text-xs font-semibold text-green-700 flex-shrink-0">
                                    {{ $initials }}
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-gray-800 leading-tight">{{ $emp->nama_karyawan }}
                                    </p>
                                    <p class="text-xs text-gray-500 leading-tight">{{ $emp->position->nama_jabatan }}</p>
                                </div>
                            </div>
                        </td>
                        {{-- Department --}}
                        <td class="px-4 py-3">
                            <span
                                class="inline-block bg-blue-100 text-blue-700 text-xs font-medium px-2.5 py-1 rounded-full">
                                {{ $emp->position->departement->nama_departement }}
                            </span>
                        </td>
                        {{-- Discipline bar --}}
                        <td class="px-4 py-3">
                            <p class="text-xs text-gray-500 mb-1">{{ number_format($disc, 0) }}%</p>
                            <div class="w-32 h-1.5 bg-gray-200 rounded-full overflow-hidden">
                                <div class="h-full rounded-full {{ $disc_color }}"
                                    style="width: {{ min($disc, 100) }}%"></div>
                            </div>
                        </td>
                        {{-- KPI bar --}}
                        <td class="px-4 py-3">
                            <p class="text-xs text-gray-500 mb-1">{{ number_format($kpi, 0) }}%</p>
                            <div class="w-32 h-1.5 bg-gray-200 rounded-full overflow-hidden">
                                <div class="h-full rounded-full {{ $kpi_color }}"
                                    style="width: {{ min($kpi, 100) }}%"></div>
                            </div>
                        </td>
                        {{-- Score --}}
                        <td class="px-4 py-3 text-center">
                            <p class="text-2xl font-bold text-gray-900 leading-tight">{{ $score }}</p>
                            <span
                                class="inline-block text-xs font-semibold px-2 py-0.5 rounded {{ $badge }}">{{ $grade }}</span>
                        </td>
                        {{-- Action --}}
                        <td class="px-4 py-3">
                            <a href="{{ route('performance-tracker.show', $emp->id) }}"
                                class="inline-flex items-center gap-1 px-3 py-1.5 border border-gray-300 rounded-md text-xs text-gray-600 bg-white hover:bg-gray-50">
                                <svg width="11" height="11" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2.5">
                                    <polyline points="9 11 12 14 22 4" />
                                    <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11" />
                                </svg>
                                Cek
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-10 text-sm text-gray-400">
                            Tidak ada data evaluasi untuk periode ini.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Pagination --}}
        <div class="flex items-center justify-between px-5 py-3 border-t border-gray-100 text-sm text-gray-500">
            <span>Menampilkan {{ $employees_assessments->firstItem() }} Hingga {{ $employees_assessments->lastItem() }}
                dari
                {{ $employees_assessments->total() }} data</span>
            <div class="flex items-center gap-1">
                @if ($employees_assessments->onFirstPage())
                    <button disabled
                        class="px-3 py-1.5 border border-gray-200 rounded-md text-gray-400 cursor-not-allowed text-sm">Sebelumnya</button>
                @else
                    <a href="{{ $employees_assessments->previousPageUrl() }}"
                        class="px-3 py-1.5 border border-gray-300 rounded-md text-gray-600 hover:bg-gray-50 text-sm">Sebelumnya</a>
                @endif

                @for ($i = 1; $i <= $employees_assessments->lastPage(); $i++)
                    <a href="{{ $employees_assessments->url($i) }}"
                        class="px-3 py-1.5 border rounded-md text-sm {{ $employees_assessments->currentPage() == $i ? 'bg-green-700 border-green-700 text-white' : 'border-gray-300 text-gray-600 hover:bg-gray-50' }}">
                        {{ $i }}
                    </a>
                @endfor

                @if ($employees_assessments->hasMorePages())
                    <a href="{{ $employees_assessments->nextPageUrl() }}"
                        class="px-3 py-1.5 border border-gray-300 rounded-md text-gray-600 hover:bg-gray-50 text-sm">Selanjutnya</a>
                @else
                    <button disabled
                        class="px-3 py-1.5 border border-gray-200 rounded-md text-gray-400 cursor-not-allowed text-sm">Selanjutnya</button>
                @endif
            </div>
        </div>

    </div>
@endsection
