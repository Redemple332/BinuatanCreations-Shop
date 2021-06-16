<div>
 <!-- ASIDE -->
 <div id="aside" class="col-md-3">
    <!-- aside widget -->
    <div class="aside">
        <h3 class="aside-title">Shop by:</h3>
        <ul class="filter-list">
            <li><span class="text-uppercase">color:</span></li>
            <li><a href="#" style="color:#FFF; background-color:#8A2454;">Camelot</a></li>
            <li><a href="#" style="color:#FFF; background-color:#475984;">East Bay</a></li>
            <li><a href="#" style="color:#FFF; background-color:#BF6989;">Tapestry</a></li>
            <li><a href="#" style="color:#FFF; background-color:#9A54D8;">Medium Purple</a></li>
        </ul>

        <ul class="filter-list">
            <li><span class="text-uppercase">Size:</span></li>
            <li><a href="#">X</a></li>
            <li><a href="#">XL</a></li>
        </ul>

        <ul class="filter-list">
            <li><span class="text-uppercase">Price:</span></li>
            <li><a href="#">MIN: $20.00</a></li>
            <li><a href="#">MAX: $120.00</a></li>
        </ul>

        <ul class="filter-list">
            <li><span class="text-uppercase">Gender:</span></li>
            <li><a href="#">Men</a></li>
        </ul>

        <button class="primary-btn">Clear All</button>
    </div>
    <!-- /aside widget -->

    <!-- aside widget -->
    <div wire:ignore class="aside">
        <h3 class="aside-title">Filter by Price</h3>
        <div id="price-slider"></div>
    </div>
    <!-- aside widget -->

    {{-- <!-- aside widget -->
    <div class="aside">
        <h3 class="aside-title">Filter By Color:</h3>

        
        <ul class="color-option">
            <li class="{{ $filter_color == null? 'active size-option':''  }}">
                <a  wire:click="Filter('{{null}}')" style="background-color:#000000;"></a>
            </li>
            @foreach ($colorsFilter as $colorsFil)
                <li class="{{ $filter_color == $colorsFil->code? 'active':''  }}">
                    <a  wire:click="Filter('{{ $colorsFil->code}}')" style="background-color:{{ $colorsFil->code }};">
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <!-- /aside widget --> --}}

    <!-- aside widget -->
    <div class="aside">
        <h3 class="aside-title">Filter By Size:</h3>
        <ul class="color-option">
            @foreach ($colors as $index => $color)
            <li class="active"><input wire:model="selected.colors" type="checkbox" id="size{{ $index }}" value="{{ $color->id }}" >
                <span style="color:{{ $color['code']}}">{{ $color['name'] }}</span>({{ $color['products_count'] }})
            </li>
            @endforeach
        </ul>
    </div>
    <!-- /aside widget -->

    <!-- aside widget -->
    <div class="aside">
        <h3 class="aside-title">Filter By Size:</h3>
        <ul class="size-option">
            @foreach ($sizes as $index => $size)
                <li  class="active"><input wire:model="selected.sizes" type="checkbox" id="size{{ $index }}" value="{{ $size->id }}" >
                    {{ $size['code'] }}({{ $size['products_count'] }})
                </li>
            @endforeach
        </ul>
    </div>
    <!-- /aside widget -->

    <!-- aside widget -->
    <div class="aside">
        <h3 class="aside-title">Filter by Gender</h3>
        <ul class="list-links">
            <li class="active"><a href="#">ALL</a></li>
            @foreach($genders as $index => $gender)
                <li> <input wire:model="selected.gender" type="checkbox" id="gender{{ $index }}"  value="{{ $index }}" > 
                    <a href="#">{{ $gender['name'] }} ({{ $gender['products_count'] }})</a>
                </li>
            @endforeach
        </ul>
    </div>
    <!-- /aside widget -->
    
    
    <!-- aside widget -->
    <div class="aside">
        <h3 class="aside-title">Top Rated Product</h3>
        <!-- widget product -->
        <div class="product product-widget">
            <div class="product-thumb">
                <img src="./img/thumb-product01.jpg" alt="">
            </div>
            <div class="product-body">
                <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                <h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
                <div class="product-rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o empty"></i>
                </div>
            </div>
        </div>
        <!-- /widget product -->

        <!-- widget product -->
        <div class="product product-widget">
            <div class="product-thumb">
                <img src="./img/thumb-product01.jpg" alt="">
            </div>
            <div class="product-body">
                <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                <h3 class="product-price">$32.50</h3>
                <div class="product-rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o empty"></i>
                </div>
            </div>
        </div>
        <!-- /widget product -->
    </div>
    <!-- /aside widget -->
</div>
<!-- /ASIDE -->

</div>
