@if ($paginator->hasPages())
    <nav>
        <ul class="pagination justify-content-center">
            {{-- First Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.first')">
                    <span class="page-link btn btn-white btn-fab btn-round" aria-hidden="true">
                        <i class="material-icons">first_page</i>
                    </span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link  btn btn-rose btn-fab btn-round" href="{{ $paginator->url(1) }}" rel="prev" aria-label="@lang('pagination.previous')">
                        <i class="material-icons">first_page</i>
                    </a>
                </li>
            @endif
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link btn btn-white btn-fab btn-round" aria-hidden="true">
                        <i class="material-icons">arrow_back_ios</i>
                    </span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link  btn btn-primary btn-fab btn-round" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                        <i class="material-icons">arrow_back_ios</i>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link btn btn-fab btn-primary btn-round">{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page">
                                <span class="page-link btn btn-fab btn-primary btn-round">
                                    {{ $page }}
                                </span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link btn btn-white btn-fab btn-round" href="{{ $url }}">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link btn btn-primary btn-fab btn-round" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                        <i class="material-icons">arrow_forward_ios</i>
                    </a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link btn btn-white btn-fab btn-round" aria-hidden="true">
                        <i class="material-icons">arrow_forward_ios</i>
                    </span>
                </li>
            @endif
            {{-- Last Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link btn btn-rose btn-fab btn-round" href="{{ $paginator->url(($paginator->lastPage())) }}" rel="next" aria-label="@lang('pagination.next')">
                        <i class="material-icons">last_page</i>
                    </a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.last')">
                    <span class="page-link btn btn-white btn-fab btn-round" aria-hidden="true">
                        <i class="material-icons">last_page</i>
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
