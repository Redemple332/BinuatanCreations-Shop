<div>
    
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">BC Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a wire:click="active" class="nav-link" href="{{route('admin.dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.products')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Products</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.orders')}}">
            <i class="fa fa-shopping-cart"></i>
            <span>Orders<span class="badge badge-danger badge-counter">7</span></span></a>
    </li>
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#productsettings"
            aria-expanded="true" aria-controls="productsettings">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Catalog</span>
        </a>
        <div id="productsettings" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Product settings:</h6>
                <a class="collapse-item" href="{{ route('admin.category') }}">Categories</a>
                <a class="collapse-item" href="{{ route('admin.color') }}">Colors</a>
                <a class="collapse-item" href="{{ route('admin.size') }}">Sizes</a>
                <a class="collapse-item" href="{{ route('admin.image') }}">Images</a>
            </div>
        </div>
    </li>
     <!-- Nav Item - Utilities Collapse Menu -->
     <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#promo"
            aria-expanded="true" aria-controls="promo">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Promo</span>
        </a>
        <div id="promo" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Product promo:</h6>
                <a class="collapse-item" href="{{ route('admin.discount') }}">Discount%</a>
                <a class="collapse-item" href="utilities-color.html">Coupon</a>
                <h6 class="collapse-header">Product advertise:</h6>
                <a class="collapse-item" href="utilities-color.html">Banners</a>
                <a class="collapse-item" href="utilities-color.html">Ads</a>           
            </div>
        </div>
    </li>
    <!-- Divider -->

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo" wire:ignore.self>
            <i class="fas fa-fw fa-cog"></i>
            <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse"  aria-labelledby="headingTwo" data-parent="#accordionSidebar" wire:ignore.self>
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage users:</h6>
                <a class="collapse-item" href="buttons.html">Admin</a>
                <a class="collapse-item" href="cards.html">Customers</a>
            </div>
        </div>
    </li>

    
   
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Reports</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Product report:</h6>
                <a class="collapse-item" href="login.html">Inventory</a>
                <a class="collapse-item" href="register.html">Sales</a>
                <a class="collapse-item" href="forgot-password.html">Others</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <center> 
        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </center>
</div>

