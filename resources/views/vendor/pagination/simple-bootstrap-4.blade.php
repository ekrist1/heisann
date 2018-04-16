@if ($paginator->hasPages())
    <ul class="flex list-reset border border-grey-light rounded w-auto font-sans mt-4">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="block hover:text-white hover:bg-blue text-blue px-3 py-2"><span>@lang('pagination.previous')</span></li>
        @else
            <li><a class="block hover:text-white hover:bg-blue text-blue px-3 py-2" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a></li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a class="block hover:text-white hover:bg-blue text-blue px-3 py-2" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a></li>
        @else
            <li class="block hover:text-white hover:bg-blue text-blue px-3 py-2"><span>@lang('pagination.next')</span></li>
        @endif
    </ul>
@endif
