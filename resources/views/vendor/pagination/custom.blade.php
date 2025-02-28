{{-- resources/views/vendor/pagination/custom.blade.php --}}
@if ($paginator->hasPages())
    <ul class="pagination" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="page-link" aria-hidden="true">&laquo;</span>
            </li>
        @else
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
                    @if ($page == $paginator->currentPage())
                        {{-- Active State --}}
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

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&raquo;</a>
            </li>
        @else
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="page-link" aria-hidden="true">&raquo;</span>
            </li>
        @endif
    </ul>
@endif


<style>
/* Pagination Styling */
.pagination {
    display: flex;
    justify-content: center;
    margin-top: 20px;
    list-style: none;
    padding-left: 0;
}

/* Each <li> container */
.pagination .page-item {
    margin: 0 5px;
}

/* Disabled links (for first/last pages) */
.pagination .disabled .page-link {
    opacity: 0.5;
    cursor: not-allowed;
    font-size: 18px; /* Larger font size for disabled links */
}

/* The actual clickable link */
.pagination .page-link {
    background: #e2ecf6; /* Inactive button background */
    color: #25262f;      /* Font color */
    border: 1px solid #e2ecf6;
    padding: 12px 20px;  /* Increased padding for a bigger button */
    border-radius: 5px;
    text-decoration: none;
    font-weight: bold;
    font-size: 18px;  /* Larger font size */
    display: inline-block;
    transition: background 0.2s ease;
}

/* Hover effect for inactive buttons */
.pagination .page-link:hover {
    background: #d1e5d0; /* Slightly darker for hover effect */
    color: #25262f;
}

/* Active page styling */
.pagination .active .page-link {
    background: #80db66; /* Active button color */
    color: #25262f;
    border-color: #80db66;
    font-size: 20px; /* Even larger font size for the active page */
}

/* Previous and Next buttons */
.pagination .page-link[rel="prev"],
.pagination .page-link[rel="next"] {
    font-size: 22px; /* Bigger font for previous/next buttons */
    font-weight: bold;
}
</style>
