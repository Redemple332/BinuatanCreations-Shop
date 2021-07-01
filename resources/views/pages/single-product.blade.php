@extends('layouts.app')
@section('content')

<livewire:products.single-item :product="$product">

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title">Picked For You</h2>
                </div>
            </div>
            <!-- section title -->

                @forelse ( $related_products as $product )

                   <!-- Product Single -->
                   <div class="col-md-3 col-sm-6 col-xs-6">
                        <livewire:template.products-template :product="$product" :wire:key="'product-template-'.$product->id">
                    </div>
                    <!-- /Product Single -->
                    
                @empty
                    <h1>No Related Products</h1>
                @endforelse
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->
@endsection