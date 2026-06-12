@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center gap-1">

        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span
                class="flex items-center justify-center w-9 h-9 rounded-xl border border-gray-200 text-gray-300 cursor-not-allowed">
                <i class="fa-solid fa-chevron-left text-xs"></i>
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}"
                class="flex items-center justify-center w-9 h-9 rounded-xl border border-gray-200 text-gray-600 hover:bg-gray-50 hover:border-gray-300 transition">
                <i class="fa-solid fa-chevron-left text-xs"></i>
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- Three Dots Separator --}}
            @if (is_string($element))
                <span class="px-2 text-gray-400">
                    {{ $element }}
                </span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span
                            class="flex items-center justify-center min-w-[36px] h-9 px-3 rounded-xl bg-emerald-500 text-white text-sm font-semibold shadow-sm">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $url }}"
                            class="flex items-center justify-center min-w-[36px] h-9 px-3 rounded-xl border border-gray-200 text-gray-600 text-sm font-medium hover:bg-gray-50 hover:border-gray-300 transition">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}"
                class="flex items-center justify-center w-9 h-9 rounded-xl border border-gray-200 text-gray-600 hover:bg-gray-50 hover:border-gray-300 transition">
                <i class="fa-solid fa-chevron-right text-xs"></i>
            </a>
        @else
            <span
                class="flex items-center justify-center w-9 h-9 rounded-xl border border-gray-200 text-gray-300 cursor-not-allowed">
                <i class="fa-solid fa-chevron-right text-xs"></i>
            </span>
        @endif

    </nav>
@endif
