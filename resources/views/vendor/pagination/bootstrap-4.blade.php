@if ($paginator->hasPages())
<nav class="pc-pagination">
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <div class="pagination-item">
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="page-link" aria-hidden="true">&lsaquo;</span>
            </li>
        </div>
        @else
        <div class="pagination-item">
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
            </li>
        </div>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <div class="pagination-item">
            <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
        </div>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        <div class="pagination-item">
            @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
            <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
            @else
            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
            @endif
            @endforeach
        </div>
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <div class="pagination-item">
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
            </li>
        </div>
        @else
        <div class="pagination-item">
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="page-link" aria-hidden="true">&rsaquo;</span>
            </li>
        </div>
        @endif
    </ul>
</nav>

<nav class="sp-pagination">
    <ul class="pagination">
        <div class="pagination-item">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="page-link" aria-hidden="true">前</span>
            </li>
            @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">前</a>
            </li>
            @endif
        </div>

        {{-- Pagination Elements --}}
        <div class="pagination-item">
            @foreach ($elements as $element)
            {{-- Array Of Links --}}
            @if (is_array($element))
            @foreach ($element as $page => $url)
            {{-- アクティブ --}}
            @if ($page == $paginator->currentPage())
            <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
            @else
            {{-- 最初のページ --}}
            @if ($page == 1)
            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
            <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
            @endif

            {{-- 最後のページ --}}
            @if ($page == $paginator->lastPage())
            <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
            @endif
            @endif
            @endforeach
            @endif
            @endforeach
        </div>

        {{-- Next Page Link --}}
        <div class="pagination-item">
            @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">次</a>
            </li>
            @else
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="page-link" aria-hidden="true">次</span>
            </li>
            @endif
        </div>
    </ul>
</nav>
@endif
