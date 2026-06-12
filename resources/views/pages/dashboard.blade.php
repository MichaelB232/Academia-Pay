@extends('layouts.app')

@section('content')
    <div class="space-y-6">

        {{-- Header --}}
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="flex items-center space-x-4 border-r border-gray-200 pr-6">
                <div class="text-4xl text-amber-500">👋</div>
                <div>
                    <h2 class="text-2xl font-bold text-[#0a855c]">
                        Selamat Datang, {{ $user->username }}
                    </h2>
                    <p class="text-gray-500 font-medium">{{ $user->role }}</p>
                </div>
            </div>

            <div class="border-r border-gray-200 px-6">
                <h3 class="text-lg font-bold text-gray-800 mb-2">Visi</h3>
                <p class="text-xs text-gray-600 leading-relaxed">
                    Menjadi Pusat Pembentukan Generasi yang Sehat, Mandiri,
                    Antusias, Religius, Tangguh, dan Nasionalis (SMART-N).
                </p>
            </div>

            <div class="pl-6">
                <h3 class="text-lg font-bold text-gray-800 mb-2">Misi</h3>
                <ol class="text-xs text-gray-600 list-decimal list-inside space-y-1">
                    <li>Menyediakan layanan pendidikan yang berkualitas...</li>
                    <li>Mengoptimalkan potensi siswa menuju generasi SMART Nasionalis...</li>
                    <li>Melaksanakan pembelajaran berbasis multiliterasi dan keberagaman...</li>
                    <li>Menghasilkan lulusan SMART yang Nasionalis dan Moderat...</li>
                </ol>
            </div>
        </div>

        {{-- Content --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- LEFT --}}
            <div class="space-y-6">

                {{-- Ringkasan Penggajian --}}
                <div class="bg-[#0b092b] text-white rounded-2xl p-6 shadow-sm">

                    <p class="text-gray-400 text-sm font-medium mb-4">
                        Ringkasan Penggajian
                    </p>

                    <p class="text-xs text-amber-500">
                        Total Gaji Bulan Ini
                    </p>

                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-3xl font-bold text-amber-400">
                            Rp {{ number_format($payroll_summary->gaji_bersih ?? 0, 0, ',', '.') }}
                        </h3>

                        <i class="fa-solid fa-wallet text-2xl text-gray-400"></i>
                    </div>

                    <div class="border-t border-white/10 pt-4 flex items-center gap-3">
                        <i class="fa-solid fa-users text-xl text-gray-400"></i>

                        <div>
                            <p class="text-xs text-gray-400">Jumlah Staff</p>
                            <p class="text-sm font-bold">
                                {{ $total_employees }} Orang
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Status Pembayaran --}}
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">

                    @php
                        $paidPercentage =
                            $total_unpaid_employees == 0
                                ? 100
                                : round(
                                    (($total_employees - $total_unpaid_employees) / max($total_employees, 1)) * 100,
                                );
                    @endphp

                    <p class="text-sm text-gray-500 mb-2">
                        Status Pembayaran Gaji
                    </p>

                    <h3 class="text-3xl font-bold text-gray-800 mb-4">
                        {{ $paidPercentage }}%
                    </h3>

                    <div class="w-full bg-gray-200 rounded-full h-3">
                        <div class="bg-[#0a855c] h-3 rounded-full" style="width: {{ $paidPercentage }}%">
                        </div>
                    </div>

                    <p class="text-xs text-gray-500 mt-3">
                        {{ $total_employees - $total_unpaid_employees }}
                        dari
                        {{ $total_employees }}
                        karyawan sudah dibayar
                    </p>

                </div>

            </div>

            {{-- RIGHT --}}
            <div class="lg:col-span-2">

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 h-full">

                    <div class="flex justify-between items-center mb-5">
                        <h3 class="text-lg font-bold text-gray-800">
                            Karyawan Belum Digaji Bulan Ini
                        </h3>

                        <span class="bg-red-50 text-red-600 px-3 py-1 rounded-lg text-sm font-medium">
                            {{ $total_unpaid_employees }} Karyawan
                        </span>
                    </div>

                    <div class="overflow-x-auto">

                        <table class="w-full text-left text-sm">

                            <thead>
                                <tr class="bg-gray-100 text-gray-700 font-semibold">
                                    <th class="p-3 rounded-l-lg">Karyawan</th>
                                    <th class="p-3">NIY</th>
                                    <th class="p-3 text-center rounded-r-lg">Detail</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-100">

                                @forelse ($unpaid_employees as $unpaid_payroll)
                                    <tr>
                                        <td class="p-3 font-medium text-gray-800">
                                            {{ $unpaid_payroll->employee->nama_karyawan }}
                                        </td>

                                        <td class="p-3 text-gray-500">
                                            {{ $unpaid_payroll->employee->niy }}
                                        </td>

                                        <td class="p-3 text-center">
                                            <a href="{{ route('daftar-karyawan.show', $unpaid_payroll->employee_id) }}"
                                                class="text-[#0a855c] border border-[#0a855c] px-3 py-1 rounded text-xs font-medium hover:bg-[#0a855c] hover:text-white transition">
                                                Detail
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="p-6 text-center text-gray-500">
                                            Semua karyawan sudah dibayar 🎉
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>

                        </table>

                    </div>

                    {{-- Pagination --}}
                    <div class="flex justify-between items-center border-t border-gray-100 mt-5 pt-4">

                        <p class="text-xs text-gray-500">
                            Menampilkan
                            {{ $unpaid_employees->firstItem() ?? 0 }}
                            -
                            {{ $unpaid_employees->lastItem() ?? 0 }}
                            dari
                            {{ $unpaid_employees->total() }}
                            data
                        </p>

                        {{ $unpaid_employees->onEachSide(1)->links() }}

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
