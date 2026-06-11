@extends('layouts.app')

@section('content')
    <div class="space-y-6">

        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="flex items-center space-x-4 border-r border-gray-200 pr-6">
                <div class="text-4xl text-amber-500">👋</div>
                <div>
                    <h2 class="text-2xl font-bold text-[#0a855c]">Selamat Datang, {{ $user->username }}</h2>
                    <p class="text-gray-500 font-medium">{{ $user->role }}</p>
                </div>
            </div>

            <div class="border-r border-gray-200 px-6">
                <h3 class="text-lg font-bold text-gray-800 mb-2">Visi</h3>
                <p class="text-xs text-gray-600 leading-relaxed">
                    Menjadi Pusat Pembentukan Generasi yang Sehat, Mandiri, Antusias, Religius, Tangguh, dan Nasionalis
                    (SMART-N).
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

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <div class="space-y-6">
                <div class="bg-[#0b092b] text-white rounded-2xl p-6 shadow-sm relative overflow-hidden">
                    <p class="text-gray-400 text-sm font-medium mb-4">Ringkasan Penggajian</p>
                    <p class="text-xs text-amber-500">Total Gaji Bulan Ini</p>
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-2xl font-bold text-amber-400">Rp
                            {{ number_format($payroll_summary->gaji_bersih, 0, ',', '.') }}</h3>
                        <button class="text-gray-400 hover:text-white">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                    </div>
                    <div class="flex items-center space-x-3 border-t border-white/10 pt-4">
                        <i class="fa-solid fa-users text-xl text-gray-400"></i>
                        <div>
                            <p class="text-xs text-gray-400">Jumlah Staff</p>
                            <p class="text-sm font-bold">{{ $total_employees }} Orang</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-center space-x-6">
                    <div
                        class="relative w-16 h-16 flex items-center justify-center rounded-full border-8 border-gray-200 border-t-amber-500 transform rotate-45">
                    </div>
                    <div class="flex-1">
                        <p class="text-xs text-gray-500 font-medium">Status Pembayaran Gaji</p>
                        <p class="text-xl font-bold text-gray-800"> 80% Selesai</p>
                        <div class="w-full bg-gray-200 h-2 rounded-full mt-2">
                            {{-- <div class="bg-[#0a855c] h-2 rounded-full"
                                style="width: {{ $payroll_summary->persentase_selesai }}%"></div>
                        </div> --}}
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 lg:col-span-2 flex flex-col justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-gray-800 mb-4">Karyawan Belum Digaji Bulan Ini</h3>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-sm">
                                <thead>
                                    <tr class="bg-gray-100 text-gray-700 font-semibold rounded-lg">
                                        <th class="p-3 rounded-l-lg">Karyawan</th>
                                        <th class="p-3">NIY</th>
                                        <th class="p-3 text-center rounded-r-lg">Detail</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    @foreach ($unpaid_employees as $unpaid_payroll)
                                        <tr>
                                            <td class="p-3 text-gray-800 font-medium">
                                                {{ $unpaid_payroll->employee->nama_karyawan }}
                                            </td>
                                            <td class="p-3 text-gray-500">{{ $unpaid_payroll->employee->niy }}</td>
                                            <td class="p-3 text-center">
                                                <a href="{{ route('daftar-karyawan.show', $unpaid_payroll->employee_id) }}"
                                                    class="text-[#0a855c] border border-[#0a855c] px-3 py-1 rounded text-xs font-medium hover:bg-[#0a855c] hover:text-white transition">Detail</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="border-t border-gray-100 pt-4 mt-4">
                        <p class="text-sm font-bold text-gray-700">Total: {{ $total_unpaid_employees }} Karyawan</p>
                    </div>
                </div>

            </div>
        </div>
    @endsection
