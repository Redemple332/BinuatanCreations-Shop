
@if ($paginator->hasPages())

    <ul class="store-pages">
        <li><span class="text-uppercase">Page:</span></li>

        <!-- prev -->
        @if ($paginator->onFirstPage())
            <li class="w-16 px-2 py-1 text-center rounded border bg-gray-200"></li>
        @else
            <li class="cursor-pointer" wire:click="previousPage"><i class="fa fa-caret-left"></i></li>
        @endif
        <!-- prev end -->
        
        <!-- numbers -->
        @foreach ($elements as $element)

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li  wire:click="gotoPage({{$page}})" class="active">{{$page}}</li>
                    @else
                        <li wire:click="gotoPage({{$page}})">{{$page}}</li>
                    @endif
                @endforeach
            @endif

        @endforeach
        <!-- end numbers -->

        <!-- next  -->
        @if ($paginator->hasMorePages())
            <li  wire:click="nextPage"><i class="fa fa-caret-right"></i></li>
        @else
            <li><i class="fa fa-caret-right"></i></li>
        @endif
        <!-- next end -->

    </ul>
@endif