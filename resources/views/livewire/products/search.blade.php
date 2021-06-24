<div>
    <div class="pull-left">
        <!-- Logo -->
        <div class="header-logo">
            <a class="logo" href="#">
                <img src="./img/logo.png" alt="">
            </a>
        </div>
        <!-- /Logo -->

        <!-- Search -->
        <div class="header-search">
            <form wire:submit.prevent="search">
                <input wire:model.lazy="search" class="input search-input" type="text" placeholder="Enter your keyword">
                <select wire:model="category" class="input search-categories">
                    <option value="0">All Categories</option>
                    @forelse ($categories as $category )
                        <option value="{{ $category->category }}">{{ $category->category }}</option> 
                    @empty
                        
                    @endforelse
                </select>
                <button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <!-- /Search -->
    </div>
</div>
