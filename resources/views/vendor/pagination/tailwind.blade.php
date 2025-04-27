<nav aria-label="Pagination" class="flex justify-center space-x-2">
    @if ($paginator->onFirstPage())
        <span class="px-4 py-2 text-gray-400 bg-gray-200 rounded-lg cursor-not-allowed">Previous</span>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" class="px-4 py-2 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 transition">Previous</a>
    @endif

    @foreach ($elements as $element)
        @if (is_string($element))
            <span class="px-4 py-2 text-gray-400">{{ $element }}</span>
        @endif
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span class="px-4 py-2 text-white bg-indigo-800 rounded-lg">{{ $page }}</span>
                @else
                    <a href="{{ $url }}" class="px-4 py-2 text-indigo-600 bg-indigo-100 rounded-lg hover:bg-indigo-200">{{ $page }}</a>
                @endif
            @endforeach
        @endif
    @endforeach

    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="px-4 py-2 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 transition">Next</a>
    @else
        <span class="px-4 py-2 text-gray-400 bg-gray-200 rounded-lg cursor-not-allowed">Next</span>
    @endif
</nav>
