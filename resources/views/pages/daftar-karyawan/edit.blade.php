@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-5 border-b border-gray-100 flex justify-between items-center">
            <h3 class="text-sm font-bold text-gray-800">Edit Data Karyawan</h3>
            <a href="{{ route('daftar-karyawan.index') }}"
                class="text-gray-400 hover:text-gray-600 w-6 h-6 rounded-full bg-gray-100 flex items-center justify-center text-xs">
                <i class="fa-solid fa-xmark"></i>
            </a>
        </div>

        <form action="{{ route('daftar-karyawan.update', $employee->id) }}" method="POST" onsubmit="disableSubmitButton()"
            class="p-6 space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-[10px] font-bold text-gray-400 tracking-wider uppercase mb-1">Nama Lengkap</label>
                <input type="text" name="nama_karyawan" value="{{ old('nama_karyawan', $employee->nama_karyawan) }}"
                    required
                    class="w-full bg-gray-50/50 border @error('nama_karyawan') border-red-500 focus:border-red-500 @else border-gray-200 focus:border-[#0a855c] @enderror rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:bg-white transition-all">
                @error('nama_karyawan')
                    <p class="text-xs text-red-500 mt-1 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-[10px] font-bold text-gray-400 tracking-wider uppercase mb-1">NIP / NIY</label>
                    <input type="text" name="niy" value="{{ old('niy', $employee->niy) }}" required
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
                            <option value="{{ $dept->id }}"
                                {{ old('department_id', $employee->position->departement_id ?? '') == $dept->id ? 'selected' : '' }}>
                                {{ $dept->nama_departement }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-[10px] font-bold text-gray-400 tracking-wider uppercase mb-1">Jabatan</label>
                    <select name="position_id" id="jabatan-select" required
                        class="w-full bg-gray-50/50 border @error('position_id') border-red-500 focus:border-red-500 @else border-gray-200 focus:border-[#0a855c] @enderror rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:bg-white transition cursor-pointer">
                        <option value="">Pilih Jabatan</option>
                    </select>
                    @error('position_id')
                        <p class="text-xs text-red-500 mt-1 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-[10px] font-bold text-gray-400 tracking-wider uppercase mb-1">Gaji Pokok
                        Awal</label>
                    <input type="number" name="gaji_pokok" value="{{ old('gaji_pokok', $employee->gaji_pokok ?? '') }}"
                        required
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
        // Memastikan kode dijalankan setelah DOM siap
        document.addEventListener('DOMContentLoaded', function() {
            const positionsByDepartment = {!! json_encode($positions) !!};
            const departmentSelect = document.getElementById('departement-select');
            const positionSelect = document.getElementById('jabatan-select');
            const selectedPosition = {{ old('position_id', $employee->position_id) ?? 'null' }};

            function populatePositions(departmentId) {
                positionSelect.innerHTML = '';

                if (!departmentId || !positionsByDepartment[departmentId]) {
                    positionSelect.innerHTML = '<option value="">Pilih Jabatan</option>';
                    return;
                }

                // Tambahkan opsi default di awal
                const defaultOption = document.createElement('option');
                defaultOption.value = "";
                defaultOption.textContent = "Pilih Jabatan";
                positionSelect.appendChild(defaultOption);

                positionsByDepartment[departmentId].forEach(position => {
                    const option = document.createElement('option');
                    option.value = position.id;
                    option.textContent = position.nama_jabatan;

                    if (position.id == selectedPosition) {
                        option.selected = true;
                    }

                    positionSelect.appendChild(option);
                });
            }

            // Inisialisasi awal saat halaman pertama kali dimuat
            populatePositions(departmentSelect.value);

            // Event listener saat departement diubah
            departmentSelect.addEventListener('change', function() {
                populatePositions(this.value);
            });
        });

        function disableSubmitButton() {
            const btn = document.getElementById('submit-btn');

            // Mengubah teks tombol agar user tahu data sedang diproses
            btn.innerText = 'MENYIMPAN...';

            // Mematikan tombol agar tidak bisa diklik lagi
            btn.disabled = true;
        }
    </script>
@endsection
