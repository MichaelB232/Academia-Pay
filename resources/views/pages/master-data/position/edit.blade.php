@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-5 border-b border-gray-100 flex justify-between items-center">
            <h3 class="text-sm font-bold text-gray-800">Edit Data Jabatan</h3>
            <a href="{{ route('master-data.index') }}"
                class="text-gray-400 hover:text-gray-600 w-6 h-6 rounded-full bg-gray-100 flex items-center justify-center text-xs">
                <i class="fa-solid fa-xmark"></i>
            </a>
        </div>

        <form action="{{ route('position.update', $position->id) }}" method="POST" onsubmit="disableSubmitButton()"
            class="p-6 space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-[10px] font-bold text-gray-400 tracking-wider uppercase mb-1">
                    Nama Jabatan
                </label>

                <input type="text" name="nama_jabatan" value="{{ old('nama_jabatan', $position->nama_jabatan) }}"
                    required
                    class="w-full bg-gray-50/50 border @error('nama_jabatan') border-red-500 focus:border-red-500 @else border-gray-200 focus:border-[#0a855c] @enderror rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:bg-white transition-all">

                @error('nama_jabatan')
                    <p class="text-xs text-red-500 mt-1 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-[10px] font-bold text-gray-400 tracking-wider uppercase mb-1">
                    Departement
                </label>

                <select name="departement_id" required
                    class="w-full bg-gray-50/50 border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-[#0a855c]">

                    @foreach ($departements as $dept)
                        <option value="{{ $dept->id }}"
                            {{ old('departement_id', $position->departement_id) == $dept->id ? 'selected' : '' }}>
                            {{ $dept->nama_departement }}
                        </option>
                    @endforeach

                </select>

                @error('departement_id')
                    <p class="text-xs text-red-500 mt-1 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-[10px] font-bold text-gray-400 tracking-wider uppercase mb-1">
                    Nominal Tunjangan
                </label>

                <input type="number" name="nominal_tunjangan"
                    value="{{ old('nominal_tunjangan', $position->nominal_tunjangan) }}" required min="1"
                    class="w-full bg-gray-50/50 border @error('nominal_tunjangan') border-red-500 focus:border-red-500 @else border-gray-200 focus:border-[#0a855c] @enderror rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:bg-white transition-all">

                @error('nominal_tunjangan')
                    <p class="text-xs text-red-500 mt-1 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                <a href="{{ route('master-data.index') }}"
                    class="px-5 py-2.5 bg-gray-100 text-gray-500 rounded-xl text-xs font-bold hover:bg-gray-200 transition">
                    BATAL
                </a>

                <button type="submit" id="submit-btn"
                    class="px-5 py-2.5 bg-[#10b981] text-white rounded-xl text-xs font-bold hover:bg-[#0d9488] transition shadow-md">
                    SIMPAN DATA
                </button>
            </div>
        </form>
    </div>

    <script>
        function disableSubmitButton() {
            const btn = document.getElementById('submit-btn');

            // Mengubah teks tombol agar user tahu data sedang diproses
            btn.innerText = 'MENYIMPAN...';

            // Mematikan tombol agar tidak bisa diklik lagi
            btn.disabled = true;
        }
    </script>
@endsection
