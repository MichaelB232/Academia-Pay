@extends('layout.app')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Data Sistem</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    brand: {
                        green: '#0F764D', /* Warna latar sidebar */
                        light: '#F3F4F6', /* Warna latar background utama */
                        btn_green: '#10B981', /* Warna tombol Tambah Departemen */
                        btn_blue: '#2563EB', /* Warna tombol Tambah Jabatan */
                    }
                }
            }
        }
    }
</script>  
</head>
<body class="bg-brand-light font-sans text-gray-800 antialiased flex h-screen overflow-hidden">



    <main class="flex-1 flex flex-col h-screen relative">
        
        <header class="bg-white h-20 flex items-center justify-between px-8 border-b border-gray-200">
            <h1 class="text-2xl font-bold text-brand-green">Master Data Sistem</h1>
            
            <div class="flex items-center gap-6">
                <div class="h-10 w-px bg-gray-300"></div>
                
                <div class="flex items-center gap-3">
                    <img src="{{ asset('storage/images/profile.jpg') }}" alt="Profile Picture" class="w-10 h-10 rounded-full object-cover border border-gray-200" onerror="this.src='https://ui-avatars.com/api/?name=Andi&background=random'">
                    <div class="flex flex-col">
                        <span class="text-sm font-bold text-gray-800 leading-none">Andi</span>
                        <span class="text-xs text-gray-400 mt-1">Admin Keuangan</span>
                    </div>
                </div>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-8">
            
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 mb-8 overflow-hidden">
                <div class="flex items-center justify-between p-6 border-b border-gray-100">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-green-50 flex items-center justify-center text-brand-green">
                            <i class="fa-solid fa-building"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-gray-800">Manajemen Biro SDM</h2>
                            <p class="text-xs text-gray-500">Struktur Unit Yayasan</p>
                        </div>
                    </div>
                    <button class="bg-brand-btn_green hover:bg-emerald-600 text-white px-5 py-2.5 rounded-lg text-sm font-medium flex items-center gap-2 transition-colors">
                        <i class="fa-solid fa-plus"></i>
                        Tambah Departemen
                    </button>
                </div>
                <div class="h-24 bg-white"></div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="flex items-center justify-between p-6 border-b border-gray-100">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center text-blue-600">
                            <i class="fa-solid fa-briefcase"></i>
                        </div>
                        <h2 class="text-lg font-bold text-gray-800">Manajemen Biro Keuangan</h2>
                    </div>
                    <button class="bg-brand-btn_blue hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg text-sm font-medium flex items-center gap-2 transition-colors">
                        <i class="fa-solid fa-plus"></i>
                        Tambah Jabatan
                    </button>
                </div>
                <div class="h-24 bg-white"></div>
            </div>

        </div>
    </main>

</body>
</html>