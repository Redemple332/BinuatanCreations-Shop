@extends('layouts.app')
@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Wishlist</li>
        </ul>
    </div>
</div>
<!-- /BREADCRUMB -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">Wishlist</h2>
                    </div>
                </div>           
            </div>
            @livewire('template.products-wishlist')
        </div>
        <!-- /container -->
    </div>
    <!-- /section --> 
@endsection