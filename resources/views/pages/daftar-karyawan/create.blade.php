@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-5 border-b border-gray-100 flex justify-between items-center">
            <h3 class="text-sm font-bold text-gray-800">Tambah Karyawan Baru</h3>
            <a href="{{ route('daftar-karyawan.index') }}"
                class="text-gray-400 hover:text-gray-600 w-6 h-6 rounded-full bg-gray-100 flex items-center justify-center text-xs">
                <i class="fa-solid fa-xmark"></i>
            </a>
        </div>

        <form action="{{ route('daftar-karyawan.store') }}" method="POST" onsubmit="disableSubmitButton()"
            class="p-6 space-y-4">
            @csrf

            <div>
                <label class="block text-[10px] font-bold text-gray-400 tracking-wider uppercase mb-1">Nama Lengkap</label>
                <input type="text" name="nama_karyawan" value="{{ old('nama_karyawan') }}" required
                    class="w-full bg-gray-50/50 border @error('nama_karyawan') border-red-500 focus:border-red-500 @else border-gray-200 focus:border-[#0a855c] @enderror rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:bg-white transition-all">
                @error('nama_karyawan')
                    <p class="text-xs text-red-500 mt-1 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-[10px] font-bold text-gray-400 tracking-wider uppercase mb-1">NIP / NIY</label>
                    <input type="text" name="niy" value="{{ old('niy') }}" required
                        class="w-full bg-gray-50/50 border @error('niy') border-red-500 focus:border-red-500 @else border-gray-200 focus:border-[#0a855c] @enderror rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:bg-white transition-all">
                    @error('niy')
                        <p class="text-xs text-red-500 mt-1 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label
                        class="block text-[10px] font-bold text-gray-400 tracking-wider uppercase mb-1">Departement</label>
                    <select id="departement-select" required
                        class="w-full bg-gray-50/50 border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-[#0a855c] focus:bg-white transition cursor-pointer">
                        <option value="">Pilih Departement</option>
                        @foreach ($departements as $dept)
                            <option value="{{ $dept->id }}">{{ $dept->nama_departement }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-[10px] font-bold text-gray-400 tracking-wider uppercase mb-1">Jabatan</label>
                    <select name="position_id" id="jabatan-select" disabled required
                        class="w-full bg-gray-50/50 border @error('position_id') border-red-500 focus:border-red-500 @else border-gray-200 focus:border-[#0a855c] @enderror rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:bg-white transition cursor-pointer disabled:opacity-50">
                        <option value="">Pilih Departement Terlebih Dahulu</option>
                    </select>
                    @error('position_id')
                        <p class="text-xs text-red-500 mt-1 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-[10px] font-bold text-gray-400 tracking-wider uppercase mb-1">Gaji Pokok
                        Awal</label>
                    <input type="number" name="gaji_pokok" value="{{ old('gaji_pokok') }}" required
                        class="w-full bg-gray-50/50 border @error('gaji_pokok') border-red-500 focus:border-red-500 @else border-gray-200 focus:border-[#0a855c] @enderror rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:bg-white transition-all">
                    @error('gaji_pokok')
                        <p class="text-xs text-red-500 mt-1 font-medium">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                <a href="{{ route('daftar-karyawan.index') }}"
                    class="px-5 py-2.5 bg-gray-100 text-gray-500 rounded-xl text-xs font-bold hover:bg-gray-200 transition text-center">BATAL</a>
                <button type="submit" id="submit-btn"
                    class="px-5 py-2.5 bg-[#10b981] text-white rounded-xl text-xs font-bold hover:bg-[#0d9488] transition shadow-md">SIMPAN
                    DATA</button>
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
        // Inject data $positions dari Laravel ke object JavaScript menggunakan json_encode
        const positionsByDepartment = {!! json_encode($positions) !!};

        document.getElementById('departement-select').addEventListener('change', function() {
            const departmentId = this.value;
            const jabatanSelect = document.getElementById('jabatan-select');

            // Reset jika opsi kosong dipilih
            if (!departmentId || !positionsByDepartment[departmentId]) {
                jabatanSelect.innerHTML = '<option value="">Pilih Departement Terlebih Dahulu</option>';
                jabatanSelect.disabled = true;
                return;
            }

            // Ambil daftar jabatan berdasarkan departmentId dari object lokal
            const availablePositions = positionsByDepartment[departmentId];

            // Bersihkan isi dropdown jabatan dan aktifkan
            jabatanSelect.innerHTML = '<option value="">Pilih Jabatan</option>';
            jabatanSelect.disabled = false;

            // Loop data langsung di sisi client
            availablePositions.forEach(position => {
                const option = document.createElement('option');
                option.value = position.id;
                option.textContent = position
                    .nama_jabatan; // Ganti sesuai properti kolom nama jabatan di tabel Anda
                jabatanSelect.appendChild(option);
            });
        });
    </script>
@endsection
