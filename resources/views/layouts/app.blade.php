<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yayasan Pelita Doktora - Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 flex h-screen overflow-hidden">

    <aside class="w-64 bg-[#0a855c] text-white flex flex-col justify-between hidden md:flex">
        <div>
            <div class="p-6 flex items-center space-x-3 border-b border-[#086b4a]">
                <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center">
                    <i class="fa-solid fa-graduation-cap text-xl"></i>
                </div>
                <div>
                    <h2 class="text-xs font-bold leading-tight">Yayasan Pelita</h2>
                    <h2 class="text-xs font-bold leading-tight">Doktora</h2>
                </div>
            </div>

            <nav class="mt-6 px-4 space-y-2">
                <a href="#"
                    class="flex items-center space-x-3 bg-white text-[#0a855c] px-4 py-3 rounded-lg font-medium shadow">
                    <i class="fa-solid fa-house"></i>
                    <span>Dashboard</span>
                </a>
                <a href="#"
                    class="flex items-center space-x-3 text-white/80 hover:bg-[#086b4a] hover:text-white px-4 py-3 rounded-lg font-medium transition">
                    <i class="fa-solid fa-calculator"></i>
                    <span>Perhitungan Gaji</span>
                </a>
                <a href="#"
                    class="flex items-center space-x-3 text-white/80 hover:bg-[#086b4a] hover:text-white px-4 py-3 rounded-lg font-medium transition">
                    <i class="fa-solid fa-chart-line"></i>
                    <span>Performance Tracker</span>
                </a>
                <a href="#"
                    class="flex items-center space-x-3 text-white/80 hover:bg-[#086b4a] hover:text-white px-4 py-3 rounded-lg font-medium transition">
                    <i class="fa-solid fa-users"></i>
                    <span>Daftar Karyawan</span>
                </a>
                <a href="#"
                    class="flex items-center space-x-3 text-white/80 hover:bg-[#086b4a] hover:text-white px-4 py-3 rounded-lg font-medium transition">
                    <i class="fa-solid fa-sliders"></i>
                    <span>Master Data</span>
                </a>
            </nav>
        </div>
    </aside>

    <div class="flex-1 flex flex-col h-screen overflow-y-auto">
        <header class="bg-white px-8 py-4 flex justify-between items-center shadow-sm">
            <h1 class="text-2xl font-bold text-[#0a855c]">Dashboard</h1>

            <div class="flex items-center space-x-3 border-l pl-4 border-gray-200">
                <div class="text-right">
                    <p class="text-sm font-bold text-gray-800">Andi</p>
                    <p class="text-xs text-gray-400">Admin Keuangan</p>
                </div>
                <div class="w-10 h-10 bg-gray-300 rounded-full overflow-hidden">
                    <img src="https://ui-avatars.com/api/?name=Andi&background=0a855c&color=fff" alt="User Avatar">
                </div>
            </div>
        </header>

        <main class="p-8 flex-1 bg-gray-50">
            @yield('content')
        </main>

        <footer class="bg-white py-3 text-center border-t border-gray-100">
            <p class="text-[#0a855c] font-bold italic tracking-wide text-sm">
                TERBANG LEBIH TINGGI MELESAT LEBIH CEPAT MELAJU LEBIH JAUH
            </p>
        </footer>
    </div>

</body>

</html>
