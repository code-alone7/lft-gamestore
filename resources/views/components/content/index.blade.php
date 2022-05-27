<div class="main-content">
  @if($contentTop)
    <x-content.top/>
  @endif
  <div class="content-middle">
    <div class="content-head__container">
      <div class="content-head__title-wrap">
        <div class="content-head__title-wrap__title bcg-title">{{ $header }}</div>
      </div>
      <div class="content-head__search-block">
        <x-search/>
      </div>
    </div>
    <div class="content-main__container">
      {{ $slot }}
    </div>
    @isset($contentFooter)
    <div class="content-footer__container">
      {{ $contentFooter }}
    </div>
    @endisset
  </div>
  @isset($headerBottom, $contentBottom)
    <x-content.bottom :header="$headerBottom">
      {{ $contentBottom }}
    </x-content.bottom>
  @endisset
</div>
