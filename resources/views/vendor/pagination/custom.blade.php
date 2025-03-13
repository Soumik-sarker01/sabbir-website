@if ($paginator->hasPages())
    <ul class="pagination" role="navigation">
        {{-- Show PREV only if NOT on page 1 --}}
        @if ($paginator->currentPage() > 1)
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}"
                   rel="prev" aria-label="@lang('pagination.previous')">
                    <i class="fas fa-chevron-left"></i> <!-- Font Awesome icon -->
                </a>
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
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}"
                   rel="next" aria-label="@lang('pagination.next')">
                    <i class="fas fa-chevron-right"></i> <!-- Font Awesome icon -->
                </a>
            </li>
        @endif
    </ul>
@endif

<style>
/* Basic pagination container styling */
.pagination {
    display: flex;
    list-style: none;
    padding: 0;
    justify-content: center;
}

/* Spacing between items */
.pagination .page-item {
    margin: 0 5px;
}

/* Base style for all page links */
.pagination .page-link {
    width: 40px;
    height: 40px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    line-height: 40px;

    font-size: 20px;
    font-weight: bold;
    text-decoration: none;
    color: #e2ecf6;

    border: none;
    background: transparent;

    transition: background 0.3s ease, color 0.3s ease;
}

/* Make the icon a bit bigger */
.pagination .page-link i {
    font-size: 20px; /* adjust as needed */
}

/* Hover state for page links */
.pagination .page-link:hover {
    background: #25262f;
    color: #80db66;
}

/* Active page: rectangular with curved corners */
.pagination .page-item.active .page-link {
    border-radius: 10px;
    background: #80db66;
    color: #25262f;
    pointer-events: none; /* disable click on the active page */
}

/* Inactive page numbers: rectangular with curved corners */
.pagination .page-item:not(.active) .page-link {
    border-radius: 10px;
}

/* Prev/Next buttons: "pill" shape (still 10px corner radius) */
.pagination .page-link[rel="prev"],
.pagination .page-link[rel="next"] {
    border-radius: 10px !important;
}

/* Disabled state (when on first/last page) */
.pagination .page-item.disabled .page-link {
    opacity: 0.5;
    cursor: not-allowed;
    background: transparent;
}
</style>
