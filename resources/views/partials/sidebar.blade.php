    <aside class="w-64 bg-brand-green text-white flex flex-col justify-between">
        <div>
            <div class="flex items-center gap-3 p-6 border-b border-brand-green/50">
                <img src="{{ asset('storage/images/logo.png') }}" alt="Logo Yayasan" class="w-10 h-10 object-contain bg-transparent" onerror="this.src='https://via.placeholder.com/40?text=Logo'">
                <div class="text-sm font-semibold leading-tight">
                    Yayasan Pelita<br>Doktora
                </div>
            </div>

            <nav class="mt-6 px-4 space-y-2">
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-white/10 transition-colors">
                    <i class="fa-solid fa-house w-5 text-center"></i>
                    <span class="text-sm font-medium">Dashboard</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-white/10 transition-colors">
                    <i class="fa-solid fa-calculator w-5 text-center"></i>
                    <span class="text-sm font-medium">Perhitungan Gaji</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-white/10 transition-colors">
                    <i class="fa-solid fa-chart-line w-5 text-center"></i>
                    <span class="text-sm font-medium">Performance Tracker</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-white/10 transition-colors">
                    <i class="fa-solid fa-users w-5 text-center"></i>
                    <span class="text-sm font-medium">Daftar Karyawan</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg bg-white text-brand-green font-bold shadow-sm">
                    <i class="fa-solid fa-sliders w-5 text-center"></i>
                    <span class="text-sm">Master Data</span>
                </a>
            </nav>
        </div>

        <div class="p-4 mb-4">
            <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-white/10 transition-colors text-white">
                <i class="fa-solid fa-arrow-right-from-bracket w-5 text-center"></i>
                <span class="text-sm font-medium">Logout</span>
            </a>
        </div>
    </aside>