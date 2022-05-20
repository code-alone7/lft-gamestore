@if ($paginator->hasPages())
  <ul class="page-nav">
      {{-- Previous Page Link --}}
      <li class="page-nav__item">
        <a href="{{ $paginator->previousPageUrl() }}" class="page-nav__item__link {{ $paginator->onFirstPage() ? 'page-nav__item__link--disabled' : '' }}">
          <i class="fa fa-angle-double-left"></i>
        </a>
      </li>

      {{-- Pagination Elements --}}
      @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
          <li class="page-nav__item"><span class="page-nav__item__link page-nav__item__link--inactive">...</span></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
          @foreach ($element as $page => $url)
            <li class="page-nav__item">
              <a href="{{ $url }}" class="page-nav__item__link {{ $page == $paginator->currentPage() ? 'page-nav__item__link--active' : '' }}">
                {{ $page }}
              </a>
            </li>
          @endforeach
        @endif
      @endforeach

      {{-- Next Page Link --}}
      <li class="page-nav__item">
        <a href="{{ $paginator->nextPageUrl() }}" class="page-nav__item__link {{ !$paginator->hasMorePages() ? 'page-nav__item__link--disabled' : '' }}">
          <i class="fa fa-angle-double-right"></i>
        </a>
      </li>
  </ul>
@endif
