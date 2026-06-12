{{-- Header --}}
<header class="bg-white px-8 py-4 flex justify-between items-center shadow-sm">

    <h1 class="text-2xl font-bold text-[#0a855c]">
        {{ $pageTitle ?? 'Pelita Doktora' }}
    </h1>

    <div class="flex items-center space-x-3 border-l pl-4 border-gray-200">

        <div class="text-right">
            <p class="text-sm font-bold text-gray-800">
                {{ Auth::user()->username }}
            </p>

            <p class="text-xs text-gray-400">
                {{ ucfirst(Auth::user()->role) }}
            </p>
        </div>

        <div class="w-10 h-10 bg-gray-300 rounded-full overflow-hidden">

            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=0a855c&color=fff"
                alt="User Avatar">

        </div>
    </div>
</header>
