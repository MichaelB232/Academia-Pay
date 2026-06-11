@extends('layouts.app')

@section('content')
    <div class="space-y-6">

        <div
            class="bg-white rounded-2xl p-4 shadow-sm border border-gray-100 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="relative w-full md:w-1/3">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </span>
                <input type="text" placeholder="Cari nama atau NIP Karyawan..."
                    class="w-full bg-gray-50 border border-gray-200 rounded-xl pl-10 pr-4 py-2.5 text-sm focus:outline-none focus:border-[#0a855c] focus:bg-white transition">
            </div>

            <div class="flex items-center gap-3 w-full md:w-auto justify-end">
                <a href="{{ route('daftar-karyawan.create') }}"
                    class="bg-[#10b981] text-white px-5 py-2.5 rounded-xl text-sm font-semibold flex items-center gap-2 hover:bg-[#0d9488] transition">
                    <i class="fa-solid fa-user-plus"></i>
                    <span>Tambah Karyawan</span>
                </a>

                <div class="relative">
                    <select
                        class="appearance-none bg-gray-50 border border-gray-200 rounded-xl pl-4 pr-10 py-2.5 text-sm font-medium text-gray-700 focus:outline-none focus:border-[#0a855c] focus:bg-white cursor-pointer">
                        <option>Semua Departemen</option>
                        <option>STAFF & TU</option>
                        <option>SMA</option>
                        <option>SMP</option>
                    </select>
                    <span
                        class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400 text-xs">
                        <i class="fa-solid fa-chevron-down"></i>
                    </span>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm border-separate border-spacing-y-2">
                    <thead>
                        <tr class="text-gray-400 font-semibold text-xs tracking-wider uppercase border-b border-gray-100">
                            <th class="pb-4 pl-4">Karyawan</th>
                            <th class="pb-4">NIY</th>
                            <th class="pb-4">Departemen</th>
                            <th class="pb-4">Jabatan</th>
                            <th class="pb-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach ($employees as $employee)
                            <tr class="hover:bg-gray-50/50 transition">
                                <td class="py-4 pl-4 flex items-center gap-3">
                                    <div
                                        class="w-9 h-9 bg-gray-200 rounded-full flex items-center justify-center text-gray-400">
                                        <i class="fa-solid fa-user text-sm"></i>
                                    </div>
                                    <span class="font-semibold text-gray-800">{{ $employee->nama_karyawan }}</span>
                                </td>
                                <td class="py-4 text-gray-600 font-medium">{{ $employee->niy }}</td>
                                <td class="py-4 text-gray-600">{{ $employee->position->departemen->nama_departemen }}</td>
                                <td class="py-4 text-gray-600">{{ $employee->position->nama_jabatan }}</td>
                                <td class="py-4 text-center">
                                    <div class="flex items-center justify-center gap-4">
                                        <a href="{{ route('daftar-karyawan.edit', $employee->id) }}"
                                            class="text-blue-500 hover:text-blue-700 transition">
                                            <i class="fa-solid fa-pen text-base"></i>
                                        </a>
                                        <form action="{{ route('daftar-karyawan.destroy', $employee->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus karyawan ini?')">
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
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div
                class="flex flex-col sm:flex-row justify-between items-center gap-4 pt-6 border-t border-gray-100 mt-4 text-xs text-gray-500">
                <p>Menampilkan {{ $employees->firstItem() }} Hingga {{ $employees->lastItem() }} dari
                    {{ $employees->total() }} data</p>
                <div>
                    {{ $employees->links('pagination::tailwind') }}
                </div>
            </div>
        </div>

    </div>
@endsection
