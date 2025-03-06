@if ($paginator->hasPages())
    <ul class="pagination" role="navigation">
        {{-- Show PREV only if NOT on page 1 --}}
        @if ($paginator->currentPage() > 1)
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&laquo;</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">{{ $element }}</span>
                </li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    {{-- Active Page --}}
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active" aria-current="page">
                            <span class="page-link">{{ $page }}</span>
                        </li>
                    @else
                        {{-- Inactive Page --}}
                        <li class="page-item">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Show NEXT only if there are more pages --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&raquo;</a>
            </li>
        @endif
    </ul>
@endif

<style>
/* Remove the circle styles from the default page links */
.pagination .page-link {
    border: none !important;
    background: transparent !important;
    color: #e2ecf6;
    font-weight: bold;
    font-size: 20px;
    text-decoration: none;
    transition: background 0.3s ease, color 0.3s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

/* Hover effect for normal page links */
.pagination .page-link:hover {
    color: #80db66;
}

/* Active page link gets a circle */
.pagination .page-item.active .page-link {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #80db66 !important;
    color: #25262f;
    pointer-events: none; /* disable clicks on current page */
}

/* Prev/Next arrows are circles, slightly larger font */
.pagination .page-link[rel="prev"],
.pagination .page-link[rel="next"] {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    font-size: 22px;
    color: #e2ecf6;
}

/* Hover effect for Prev/Next arrows */
.pagination .page-link[rel="prev"]:hover,
.pagination .page-link[rel="next"]:hover {
    background: #80db66;
    color: #25262f;
}

/* Disabled prev/next state (when on first or last page) */
.pagination .page-item.disabled .page-link {
    opacity: 0.5;
    cursor: not-allowed;
    background: transparent !important;
}
</style>
