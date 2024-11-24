
@if ($paginator->hasPages())
    <div class="tp-shop-pagination mt-20">
        <div class="tp-pagination">
            <nav>
                <ul class="flex justify-center">
                    {{-- Previous Page Link --}}
                    

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li wire:key="paginator-{{ $paginator->getPageName() }}-page-{{ $page }}" class="active" aria-current="page"><span class="current">{{ $page }}</span></li>
                                @else
                                    <li style="cursor: pointer" wire:key="paginator-{{ $paginator->getPageName() }}-page-{{ $page }}"><a wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')" >{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    
                </ul>
            </nav>
        </div>
    </div>
@endif
