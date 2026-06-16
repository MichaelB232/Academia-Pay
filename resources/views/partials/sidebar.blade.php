<aside class="w-64 bg-[#0a855c] text-white flex flex-col justify-between hidden md:flex">
    <div>

        {{-- Logo --}}
        <div class="p-6 flex items-center space-x-3 border-b border-[#086b4a]">
            <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center">
                <i class="fa-solid fa-graduation-cap text-xl"></i>
            </div>

            <div>
                <h2 class="text-xs font-bold leading-tight">
                    Yayasan Pelita
                </h2>

                <h2 class="text-xs font-bold leading-tight">
                    Doktora
                </h2>
            </div>
        </div>

        {{-- Menu --}}
        <nav class="mt-6 px-4 space-y-2">

            {{-- Dashboard --}}
            <a href="{{ route('dashboard') }}"
                class="flex items-center space-x-3 px-4 py-3 rounded-lg font-medium transition
                    {{ request()->routeIs('dashboard')
                        ? 'bg-white text-[#0a855c] shadow'
                        : 'text-white/80 hover:bg-[#086b4a] hover:text-white' }}">

                <i class="fa-solid fa-house"></i>
                <span>Dashboard</span>
            </a>

            {{-- Perhitungan Gaji --}}
            <a href="#"
                class="flex items-center space-x-3 px-4 py-3 rounded-lg font-medium transition
                    {{ request()->routeIs('perhitungan-gaji.*')
                        ? 'bg-white text-[#0a855c] shadow'
                        : 'text-white/80 hover:bg-[#086b4a] hover:text-white' }}">

                <i class="fa-solid fa-calculator"></i>
                <span>Perhitungan Gaji</span>
            </a>

            {{-- Performance Tracker --}}
            <a href="{{ route('performance-tracker.index') }}"
                class="flex items-center space-x-3 px-4 py-3 rounded-lg font-medium transition
                    {{ request()->routeIs('performance-tracker.*')
                        ? 'bg-white text-[#0a855c] shadow'
                        : 'text-white/80 hover:bg-[#086b4a] hover:text-white' }}">

                <i class="fa-solid fa-chart-line"></i>
                <span>Performance Tracker</span>
            </a>

            {{-- Daftar Karyawan --}}
            <a href="{{ route('daftar-karyawan.index') }}"
                class="flex items-center space-x-3 px-4 py-3 rounded-lg font-medium transition
                    {{ request()->routeIs('daftar-karyawan.*')
                        ? 'bg-white text-[#0a855c] shadow'
                        : 'text-white/80 hover:bg-[#086b4a] hover:text-white' }}">

                <i class="fa-solid fa-users"></i>
                <span>Daftar Karyawan</span>
            </a>
            {{-- Master Data --}}
            <a href="{{ route('master-data.index') }}"
                class="flex items-center space-x-3 px-4 py-3 rounded-lg font-medium transition
                    {{ request()->routeIs(['master-data.*', 'departement.*', 'position.*', 'kpi-criteria.*'])
                        ? 'bg-white text-[#0a855c] shadow'
                        : 'text-white/80 hover:bg-[#086b4a] hover:text-white' }}">

                <i class="fa-solid fa-sliders"></i>
                <span>Master Data</span>
            </a>

        </nav>
    </div>

    {{-- Logout --}}
    <div class="p-4 border-t border-[#086b4a]">

        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button type="submit"
                class="w-full flex items-center justify-center gap-2 bg-white/10 hover:bg-white/20 transition py-3 rounded-lg cursor-pointer">

                <i class="fa-solid fa-right-from-bracket"></i>

                <span>Logout</span>
            </button>
        </form>
    </div>

</aside>
