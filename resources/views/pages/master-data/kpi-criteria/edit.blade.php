@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

        {{-- Header --}}
        <div class="p-5 border-b border-gray-100 flex justify-between items-center">
            <h3 class="text-lg font-bold text-gray-800">
                Edit KPI
            </h3>

            <a href="{{ route('kpi-criteria.position', $kpi->position_id) }}"
                class="text-gray-400 hover:text-gray-600 w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center">
                <i class="fa-solid fa-xmark"></i>
            </a>
        </div>

        {{-- Form --}}
        <form action="{{ route('kpi-criteria.update', $kpi->id) }}" method="POST" onsubmit="disableSubmitButton()"
            class="p-6 space-y-5">

            @csrf
            @method('PUT')

            <input type="hidden" name="position_id" value="{{ $kpi->position_id }}">

            {{-- Nama KPI --}}
            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase mb-2">
                    Nama KPI
                </label>

                <input type="text" name="nama_kriteria" value="{{ old('nama_kriteria', $kpi->nama_kriteria) }}" required
                    class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-[#0a855c]">

                @error('nama_kriteria')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Deskripsi --}}
            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase mb-2">
                    Deskripsi
                </label>

                <textarea name="deskripsi" rows="4"
                    class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-[#0a855c]">{{ old('deskripsi', $kpi->deskripsi) }}</textarea>

                @error('deskripsi')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Bobot + Metode Ukur --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                {{-- Bobot --}}
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase mb-2">
                        Bobot (%)
                    </label>

                    <input type="number" name="bobot" min="0" max="100"
                        value="{{ old('bobot', $kpi->bobot) }}" required
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-[#0a855c]">

                    @error('bobot')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Metode Ukur --}}
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase mb-2">
                        Metode Ukur
                    </label>

                    <select name="metode_ukur" required
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-[#0a855c]">

                        <option value="">Pilih Metode</option>

                        <option value="percentage"
                            {{ old('metode_ukur', $kpi->metode_ukur) == 'percentage' ? 'selected' : '' }}>
                            Persentase
                        </option>

                        <option value="sudah_belum"
                            {{ old('metode_ukur', $kpi->metode_ukur) == 'sudah_belum' ? 'selected' : '' }}>
                            Sudah / Belum
                        </option>

                    </select>

                    @error('metode_ukur')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            {{-- Jenis Tunjangan --}}
            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase mb-2">
                    Integrasi Tunjangan
                </label>

                <select name="jenis_tunjangan" required
                    class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-[#0a855c]">

                    <option value="">Pilih Integrasi</option>

                    <option value="tunjangan_kedisiplinan"
                        {{ old('jenis_tunjangan', $kpi->jenis_tunjangan) == 'tunjangan_kedisiplinan' ? 'selected' : '' }}>
                        Tunjangan Kedisiplinan
                    </option>

                    <option value="tunjangan_performa"
                        {{ old('jenis_tunjangan', $kpi->jenis_tunjangan) == 'tunjangan_performa' ? 'selected' : '' }}>
                        Tunjangan Performa
                    </option>

                </select>

                @error('jenis_tunjangan')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Buttons --}}
            <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">

                <a href="{{ route('kpi-criteria.position', $kpi->position_id) }}"
                    class="px-5 py-2.5 bg-gray-100 text-gray-500 rounded-xl text-xs font-bold hover:bg-gray-200 transition">
                    BATAL
                </a>

                <button type="submit" id="submit-btn"
                    class="px-5 py-2.5 bg-[#10b981] text-white rounded-xl text-xs font-bold hover:bg-[#0d9488] transition shadow-md">
                    UPDATE DATA
                </button>

            </div>

        </form>

    </div>

    <script>
        function disableSubmitButton() {
            const btn = document.getElementById('submit-btn');
            btn.innerText = 'MENYIMPAN...';
            btn.disabled = true;
        }
    </script>
@endsection
